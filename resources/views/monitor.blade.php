<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Monitor Absen - Geotagging BBLKS</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>
<body style="background: lightgray">

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <a href="/"> << Home</a>
                        <!-- <a href="{{ route('absenmonitor.create') }}" class="btn btn-md btn-success mb-3">TAMBAH POST</a> -->
                        <h2 class="text-center">Monitor absen</h2>
                        <hr>
                        <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th scope="col">Foto</th>
                                <th scope="col">Lat</th>
                                <th scope="col">Long</th>
                                <th scope="col">Mac Address</th>
                                <th scope="col">Waktu Absen</th>
                              </tr>
                            </thead>
                            <tbody>
                              @forelse ($absenmonitor as $post)
                                <tr>
                                    <td class="text-center">
                                        <img src="{{ Storage::url('public/absenlogs/').$post->foto }}" class="rounded" style="width: 150px">
                                    </td>
                                    <td>{{ $post->lat }}</td>
                                    <td>{!! $post->long !!}</td>
                                    <td>{{ $post->mac_address }}</td>
                                    <td>{{ $post->created_at }}</td>
                                    <!-- <td class="text-center">
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('absenmonitor.destroy', $post->id) }}" method="POST">
                                            <a href="{{ route('absenmonitor.edit', $post->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                        </form>
                                    </td> -->
                                </tr>
                              @empty
                                  <div class="alert alert-danger">
                                      Data absen belum tersedia.
                                  </div>
                              @endforelse
                            </tbody>
                          </table>  
                          {{ $absenmonitor->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        //message with toastr
        @if(session()->has('success'))
        
            toastr.success('{{ session('success') }}', 'BERHASIL!'); 

        @elseif(session()->has('error'))

            toastr.error('{{ session('error') }}', 'GAGAL!'); 
            
        @endif
    </script>

</body>
</html>