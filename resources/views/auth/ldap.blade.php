@extends('app')

<style>
    form.login-form{
        border:1px solid lightblue;
        padding:10px;
    }
</style>

@section('content')

  <div class="container">
      
    <div class="row">
    <div class="col-lg-6 col-lg-push-3" style="position:relative;text-align:center;background: lightyellow;border:1px solid lightblue;padding: 10px">
        <h4 style="position:absolute;right: -10px;top:0px;background: red;padding:4px;color: #fff">BARU</h4>
        <h4 style="color: blue">apps-itjen.kemenkeu.go.id</h4>
        <h1>Single Sign-On G2</h1>
        <div>
            Login Menggunakan <b>Akun Kemenkeu</b> ke Semua Aplikasi Inspektorat Jenderal
        </div>
    </div>
    </div>
    <br/>
    
    <div class="row">
    <form action="login" method="POST" class="col-lg-6 col-lg-offset-3 login-form">
      <input type="hidden" name="_token" value="{{csrf_token()}}">
      <div class="input-group">
        <input type="text" class="form-control" placeholder="username kemenkeu, contoh: andika.jati" name="username" aria-describedby="basic-addon2">
        <span class="input-group-addon" id="basic-addon2">@kemenkeu.go.id</span>
      </div>
      <br>
      <input type="password" class="form-control" name="password" placeholder="password">
      <br/>
      @if(\Request::get('ggl'))
        <input type="hidden" name="ggl" value={{\Request::get('ggl')}}/>
      @endif
      <input type="submit" value="Masuk" class="btn btn-primary btn-block"/>
    </form>
    </div>
    
    
    <div class="row">
    <div class="col-lg-6 col-lg-push-3" style="position:relative;text-align:center;background: #eee;border:1px solid lightblue;padding: 10px">
        <div style="text-align:left">
            Sebagai upaya meningkatkan kepuasan pengguna, <b>Bagian Sistem Informasi Pengawasan</b> sedang melakukan piloting aplikasi single sign-on G2. 
            Dengan mekanisme single sign-on G2, pengguna cukup login sekali untuk masuk keseluruh aplikasi berbasis web di Inspektorat Jenderal.
            <br/>
            Adapun aplikasi yang sudah mendukung single sign-on G2 saat ini antara lain: 
            <ul>
                <li>Aplikasi Manajemen Talenta</li>
                <li>Aplikasi MLS (Layanan IT).</li>
            </ul>
            Kami akan terus melakukan integrasi ke aplikasi-aplikasi lainnya. 
            <br/>
            <div class="alert alert-danger">
                Apabila Anda mengalami kendala dalam masuk ke aplikasi SSO, silahkan menghubungi Muhammad Azamuddin pada nomor 6584 / 6673. Terima kasih.
            </div>
        </div>
    </div>
    </div>
    <br/>
    

  </div>

@stop
