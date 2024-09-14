@extends('superadmin.admin')

@section('main-content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">{{ __('Tentang Kami') }}</h1>

<div class="row justify-content-center">

    <div class="col-lg-8">

        <div class="card shadow mb-4 border-0 rounded-lg">
            <div class="card-header py-3">
                <h5 class="font-weight-bold text-primary">Tentang Dasa Wisma Kabupaten Jepara</h5>
            </div>

            <div class="card-body">
                <div class="text-center mb-4">
                    <img src="https://sippn.menpan.go.id/images/article/large/logo-jepara-11.png" class="img-fluid" alt="Logo Jepara" style="max-height: 100px; border-radius: 8px;">
                </div>

                <p class="text-justify">Kami adalah Dasa Wisma Kabupaten Jepara, sebuah platform yang berkomitmen untuk meningkatkan kualitas kehidupan masyarakat melalui berbagai program dan inisiatif sosial. Dengan pendekatan yang inovatif dan berfokus pada kebutuhan masyarakat, kami berusaha memberikan layanan terbaik dan mendukung pembangunan komunitas di Kabupaten Jepara.</p>

                <p class="text-justify">Website ini dirancang untuk mempermudah akses informasi dan layanan terkait dengan program-program Dasa Wisma. Kami mengundang Anda untuk menjelajahi halaman ini dan mengetahui lebih lanjut tentang apa yang kami lakukan dan bagaimana kami dapat membantu Anda.</p>

                <h5 class="font-weight-bold text-primary mt-4">Visi dan Misi</h5>
                <p class="text-justify">Visi kami adalah menciptakan komunitas yang sejahtera dan mandiri melalui berbagai program pemberdayaan masyarakat. Misi kami adalah menyediakan fasilitas dan dukungan yang dibutuhkan oleh masyarakat untuk mencapai tujuan tersebut. Kami percaya bahwa melalui kolaborasi dan partisipasi aktif, kita dapat mencapai hasil yang luar biasa.</p>

                <h5 class="font-weight-bold text-primary mt-4">Kontak Kami</h5>
                <p class="text-justify">Jika Anda memiliki pertanyaan atau ingin mengetahui lebih lanjut, jangan ragu untuk menghubungi kami melalui email di <a href="mailto:info@dasa-wisma-jepara.id" class="text-primary">info@dasa-wisma-jepara.id</a> atau kunjungi kantor kami di Jalan Raya Jepara No. 1, Jepara. Kami siap membantu Anda dengan sepenuh hati.</p>

                <a href="{{ route('superadmin.dashboard') }}" class="btn btn-primary btn-block">
                    <i class="fas fa-home fa-fw"></i> Kembali ke Dashboard
                </a>
            </div>
        </div>

        <div class="card shadow mt-4 border-0 rounded-lg">
            <div class="card-body text-center">
                <p class="font-weight-bold">Website ini dibuat oleh Diskominfo Jepara sebagai bagian dari upaya kami untuk mendukung perkembangan digital dan pelayanan publik di Kabupaten Jepara.</p>
            </div>
        </div>

    </div>

</div>

@endsection