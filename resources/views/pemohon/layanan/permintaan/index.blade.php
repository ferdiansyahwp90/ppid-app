@extends('admin.home.index')

@section('content')

<div class="container">       
    <div class="text-center">
          <h3>PEMERINTAH KABUPATEN PROBOLINGGO</h3>
          <h3>PEJABAT PENGELOLA INFORMASI DAN DOKUMENTASI</h3>
          <p>Jl. Raya Panglima Sudirman No. 134 Kraksaan, diskominfo@probolinggokab.go.id <br> PROBOLINGGO, 67219</p>

          <h3>FORMULIR PERMOHONAN INFROMASI <br> (RANGKAP DUA)</h3>
          <h4>No. Pendaftaran (diisi petugas)*</h4>
    </div>

        <form action="#" class="container">
            <label for="fname">Nama:</label>
            <input type="text" id="fname" name="fname"><br>
            
            <label for="No">No. KTP/SIM/Paspor:</label>
            <input type="text" id="No" name="No"><br>
            
            <label for="pekerjaan">Pekerjaan:</label>
            <input type="text" id="pekerjaan" name="pekerjaan"><br>
            
            <label for="telp">No. Telp:</label>
            <input type="text" id="telp" name="telp"><br>

            <label for="email">Email:</label>
            <input type="text" id="email" name="email"><br>
            
            <label for="rincian">Rincian Infromasi yang Dibutuhkan:</label>
            <input type="text" id="rincian" name="rincian"><br>

            <label for="lname">Cara Memperoleh Infromasi**:</label>
            <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
            <label for="vehicle1"> Melihat/membaca/mendengarkan/mencatat</label><br>
            <input type="checkbox" id="vehicle2" name="vehicle1" value="Bike">
            <label for="vehicle2"> Mendapatkan salinan infromasi (hardcopy/softcopy)</label><br>

            <label for="salinan">Cara Mendapatkan Salinan Infromasi**:</label>
            <input type="checkbox" id="langsung" name="langsung" value="Mengambil Langsung" >
            <label for="1"> Mengambil Langsung</label><br>
            <input type="checkbox" id="email" name="email" value="Email">
            <label for="5">Email</label><br>
            
            <input type="submit" value="Submit">
        </form> 
</div>

@endsection