import 'package:flutter/material.dart';

class Pengumuman extends StatefulWidget {
  const Pengumuman({super.key});

  @override
  State<Pengumuman> createState() => _PengumumanState();
}

class _PengumumanState extends State<Pengumuman> {
  int _pageIndex = 0;
  int _selectedIndex = 0;

  final List<Map<String, String>> _announcements = [
    {
      'judul': 'Puskesmas Siborongborong Akan Mengadakan Pemeriksaan Kesehatan Gratis Bagi Warga Kurang Mampu',
      'tanggal': '07-04-2025',
      'konten':
          'Puskesmas akan memberikan pelayanan kesehatan kepada masyarakat secara gratis bagi warga kurang mampu. Pemeriksaan meliputi tekanan darah, gula darah, kolesterol, dan konsultasi kesehatan.\n\nTanggal: 10–12 April 2025\nLokasi: Aula Puskesmas Siborongborong\n\nHarap membawa KTP dan KK sebagai bukti identitas. Info lebih lanjut hubungi petugas kami.',
    },
    {
      'judul': 'Pemberitahuan Penutupan Sementara Puskesmas Dalam Rangka Libur Nasional Hari Raya Idul Fitri',
      'tanggal': '06-04-2025',
      'konten': 'Puskesmas akan tutup dari tanggal 8–15 April 2025 untuk libur Idul Fitri dan akan beroperasi kembali pada tanggal 16 April 2025.',
    },
    {
      'judul': 'Layanan Konseling Psikologis Kini Hadir di Puskesmas Setiap Hari Jumat: Daftarkan Diri Anda!',
      'tanggal': '05-04-2025',
      'konten': 'Puskesmas kini menghadirkan layanan konseling psikologis setiap hari Jumat. Daftarkan diri Anda melalui loket pendaftaran atau aplikasi puskesmas.',
    },
    {
      'judul': 'Skrining Penyakit Tidak Menular (PTM) Akan Dilaksanakan Selama Bulan April',
      'tanggal': '28-03-2025',
      'konten': 'Skrining PTM seperti diabetes, hipertensi, dan kolesterol akan dilakukan setiap hari kerja selama bulan April. Harap datang pagi hari dan tidak sarapan sebelum skrining.',
    },
    {
      'judul': 'Pengumuman Sistem Antrian Digital Akan Diterapkan Mulai Tanggal 20 April 2025',
      'tanggal': '26-03-2025',
      'konten': 'Mulai 20 April 2025, puskesmas akan menerapkan sistem antrian digital melalui aplikasi atau mesin antrian di lokasi. Tujuannya untuk meningkatkan efisiensi pelayanan.',
    },
  ];

  void _openDetail(int index) {
    setState(() {
      _selectedIndex = index;
      _pageIndex = 1;
    });
  }

  Widget _buildListPage() {
    return ListView.builder(
      padding: const EdgeInsets.all(16),
      itemCount: _announcements.length,
      itemBuilder: (context, index) {
        final item = _announcements[index];
        return Card(
          margin: const EdgeInsets.only(bottom: 12),
          child: ListTile(
            title: Text(
              item['judul']!,
              style: const TextStyle(fontWeight: FontWeight.bold),
              maxLines: 2,
              overflow: TextOverflow.ellipsis,
            ),
            subtitle: Text(item['tanggal']!),
            onTap: () => _openDetail(index),
          ),
        );
      },
    );
  }

  Widget _buildDetailPage() {
    final item = _announcements[_selectedIndex];
    return SingleChildScrollView(
      padding: const EdgeInsets.all(16),
      child: Column(
        crossAxisAlignment: CrossAxisAlignment.start,
        children: [
          Center(
            child: Image.asset('assets/medical_center.png', height: 150), // Gambar ilustrasi
          ),
          const SizedBox(height: 16),
          Text(
            item['judul']!,
            style: const TextStyle(fontSize: 18, fontWeight: FontWeight.bold),
          ),
          const SizedBox(height: 8),
          Row(
            children: [
              const Icon(Icons.calendar_today, size: 16, color: Colors.grey),
              const SizedBox(width: 6),
              Text(
                item['tanggal']!,
                style: const TextStyle(color: Colors.grey),
              ),
            ],
          ),
          const SizedBox(height: 16),
          Text(
            item['konten']!,
            style: const TextStyle(fontSize: 16),
            textAlign: TextAlign.justify,
          ),
        ],
      ),
    );
  }

  @override
  Widget build(BuildContext context) {
    final isDetail = _pageIndex == 1;

    return Scaffold(
      appBar: AppBar(
        title: Text(isDetail ? 'Detail Pengumuman' : 'Pengumuman'),
        backgroundColor: const Color(0xFF06489F),
        leading: isDetail
            ? IconButton(
                icon: const Icon(Icons.arrow_back),
                onPressed: () => setState(() => _pageIndex = 0),
              )
            : null,
      ),
      body: isDetail ? _buildDetailPage() : _buildListPage(),
    );
  }
}
