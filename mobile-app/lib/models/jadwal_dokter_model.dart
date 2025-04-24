class JadwalDokterModel {
  final int id;
  final String namaDokter;
  final String spesialis;
  final String hari;
  final String jamMulai;
  final String jamSelesai;
  final String ruangan;
  final String status;

  JadwalDokterModel({
    required this.id,
    required this.namaDokter,
    required this.spesialis,
    required this.hari,
    required this.jamMulai,
    required this.jamSelesai,
    required this.ruangan,
    required this.status,
  });

  factory JadwalDokterModel.fromJson(Map<String, dynamic> json) {
    return JadwalDokterModel(
      id: json['id'] ?? 0,
      namaDokter: json['nama_dokter'] ?? '',
      spesialis: json['spesialis'] ?? '',
      hari: json['hari'] ?? '',
      jamMulai: json['jam_mulai'] ?? '',
      jamSelesai: json['jam_selesai'] ?? '',
      ruangan: json['ruangan'] ?? '',
      status: json['status'] ?? '',
    );
  }
}
