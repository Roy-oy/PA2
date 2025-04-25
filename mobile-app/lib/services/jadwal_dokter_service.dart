import 'dart:convert';
import 'dart:io';
import 'package:http/http.dart' as http;
import '../models/jadwal_dokter_model.dart';

class JadwalDokterService {
  // Base URL for the API
  static String baseUrl = 'http://10.0.2.2:8000/api';

  // Singleton pattern
  static final JadwalDokterService _instance = JadwalDokterService._internal();

  factory JadwalDokterService() => _instance;

  JadwalDokterService._internal();

  // Method to update the base URL
  static void updateBaseUrl(String newUrl) {
    print('Updating API base URL from $baseUrl to $newUrl');
    baseUrl = newUrl;
  }

  Future<List<JadwalDokterModel>> getJadwalDokter() async {
    try {
      print('Fetching doctor schedules from: $baseUrl/jadwal-dokter');

      final response = await http.get(
        Uri.parse('$baseUrl/jadwal-dokter'),
        headers: {
          'Accept': 'application/json',
          'Content-Type': 'application/json',
        },
      );

      print('Response status: ${response.statusCode}');
      print('Response body preview: ${response.body.substring(0, response.body.length.clamp(0, 200))}...');

      if (response.statusCode == 200) {
        final Map<String, dynamic> jsonResponse = jsonDecode(response.body);
        
        if (jsonResponse['data'] != null) {
          final List<dynamic> jadwalList = jsonResponse['data'];
          print('Found ${jadwalList.length} doctor schedules');

          final schedules = jadwalList
              .map((item) => JadwalDokterModel.fromJson(item))
              .toList();

          print('Successfully parsed doctor schedules');
          return schedules;
        }
        throw Exception('Data jadwal dokter tidak ditemukan');
      }
      throw Exception('Failed to load schedules. Status: ${response.statusCode}');
      
    } on SocketException {
      throw Exception('Tidak dapat terhubung ke server. Periksa koneksi internet Anda.');
    } on HttpException {
      throw Exception('Tidak dapat mengambil data jadwal dokter.');
    } on FormatException {
      throw Exception('Format data jadwal dokter tidak valid.');
    } catch (e) {
      print('Error in getJadwalDokter: $e');
      throw Exception('Terjadi kesalahan: ${e.toString()}');
    }
  }
}
