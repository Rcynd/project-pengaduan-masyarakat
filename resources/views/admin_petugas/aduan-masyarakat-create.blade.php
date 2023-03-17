@extends('layouts.master')
@section('content')
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Tambah Aduan</h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card glass-card-t">
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
                <div class="">
                    <!-- form start -->
                    <form method="post" action="{{ asset('') }}aduan/create" class="mb-5" enctype="multipart/form-data">
                        @csrf
                      <div class="card-body">
                        <input type="hidden" name="nik" value="{{ $nik }}">
                        <input type="hidden" name="id_masyarakat" value="{{ $id_masyarakat }}">
                        <input type="hidden" name="status" value="menunggu">
                        <div class="form-group">
                          <label for="isi_laporan">Laporan</label>
                          @error('isi_laporan')
                          <p class="text-danger">{{ $message }}</p>
                          @enderror
                          <textarea id="description" class="form-control" name="isi_laporan"rows="3">{{ old('isi_laporan') }}</textarea>
                        </div>
                        <div class="mb-3">
                          <label for="foto" class="form-label">Kirim Foto :</label>
                          <img src="" alt="" class="img-preview img-fluid mb-3 col-sm-5" >
                          <input class="@error('foto') is-invalid @enderror" type="file" id="foto" name="foto" onchange="previewImage()" accept="image/*">
                          @error('foto')
                              <div class="invalid-feedback">
                                {{ $message }}
                              </div>
                          @enderror
                      </div>
                      <!-- /.card-body -->
      
                      <div class="">
                        <a class="btn glass-card-btn" href="{{ asset('') }}aduan">Kembali</a>
                        <button type="submit" class="btn text-dark float-right glass-card-btn2">Submit</button>
                      </div>
                    </form>
                  </div>
                  <!-- /.card -->
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>

  <script>
    function previewImage() {
        const image = document.querySelector('#foto')
        const imgPreview = document.querySelector('.img-preview')
        
        imgPreview.style.display = 'block'

        const oFReader = new FileReader()
        oFReader.readAsDataURL(image.files[0])

        oFReader.onload = function (oFREvent) {
            imgPreview.src = oFREvent.target.result
        }
    }
</script>

@endsection