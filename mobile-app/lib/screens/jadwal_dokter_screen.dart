import 'package:flutter/material.dart';
import '../models/jadwal_dokter_model.dart';
import '../services/jadwal_dokter_service.dart';

class JadwalDokterScreen extends StatefulWidget {
  const JadwalDokterScreen({Key? key}) : super(key: key);

  @override
  State<JadwalDokterScreen> createState() => _JadwalDokterScreenState();
}

class _JadwalDokterScreenState extends State<JadwalDokterScreen> {
  final JadwalDokterService _service = JadwalDokterService();
  List<JadwalDokterModel> _jadwalList = [];
  bool _isLoading = true;

  @override
  void initState() {
    super.initState();
    _loadJadwalDokter();
  }

  Future<void> _loadJadwalDokter() async {
    setState(() => _isLoading = true);
    try {
      final jadwalList = await _service.getJadwalDokter();
      setState(() {
        _jadwalList = jadwalList;
        _isLoading = false;
      });
      
      // Debug log
      print('Loaded ${jadwalList.length} schedules');
      
    } catch (e) {
      setState(() => _isLoading = false);
      ScaffoldMessenger.of(context).showSnackBar(
        SnackBar(
          content: Text('Error: ${e.toString()}'),
          backgroundColor: Colors.red,
          duration: const Duration(seconds: 5),
        ),
      );
    }
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: const Text('Jadwal Dokter'),
      ),
      body: _isLoading
          ? const Center(child: CircularProgressIndicator())
          : RefreshIndicator(
              onRefresh: _loadJadwalDokter,
              child: ListView.builder(
                itemCount: _jadwalList.length,
                itemBuilder: (context, index) {
                  final jadwal = _jadwalList[index];
                  return Card(
                    margin: const EdgeInsets.symmetric(
                      horizontal: 16,
                      vertical: 8,
                    ),
                    child: ListTile(
                      title: Text(jadwal.namaDokter),
                      subtitle: Column(
                        crossAxisAlignment: CrossAxisAlignment.start,
                        children: [
                          Text(jadwal.spesialis),
                          Text('${jadwal.hari}, ${jadwal.jamMulai} - ${jadwal.jamSelesai}'),
                          Text('Ruangan: ${jadwal.ruangan}'),
                        ],
                      ),
                      trailing: Container(
                        padding: const EdgeInsets.all(6),
                        decoration: BoxDecoration(
                          color: jadwal.status.toLowerCase() == 'aktif'
                              ? Colors.green
                              : Colors.red,
                          borderRadius: BorderRadius.circular(4),
                        ),
                        child: Text(
                          jadwal.status,
                          style: const TextStyle(color: Colors.white),
                        ),
                      ),
                    ),
                  );
                },
              ),
            ),
    );
  }
}
