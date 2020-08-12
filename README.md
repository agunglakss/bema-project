Private Project.


- Import File Menggunakan maatwebsite/excel
   . composer require maatwebsite/excel
   . Pada bagian App/Config.php isi dengan
      'providers' => [
         Maatwebsite\Excel\ExcelServiceProvider::class,
      ]
   . Pada bagian App/Config.php isi dengan
      'aliases' => [
         'Excel' => Maatwebsite\Excel\Facades\Excel::class,
      ]
   . lalu ketik di terminal php artisan vendor:publish, pilih yang mau dibuat publish dengan ketik angka disamping lalu tekan enter.
   . lalu ketik di terminal php artisan make:export NamaModelExport --model=NamaModel