@extends('layouts.auth')

@section('main-content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- 405 Error Text -->
    <div class="text-center">
        <!-- Error Icon with Animation -->
        <div class="error mx-auto" data-text="405">
            <div class="number">405</div>
            <div class="icon">
                <svg width="100" height="100" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm-1-13h-2v6h2V7zm-2 8h2v2h-2v-2z" fill="#fff" />
                </svg>
            </div>
        </div>
        <p class="lead text-gray-800 mb-5">Method Not Allowed</p>
        <p class="text-gray-500 mb-4">The method you are using is not allowed for this endpoint.</p>
        <a class="btn btn-primary btn-lg" href="{{ url('/') }}">
            &larr; Back to Dashboard
        </a>
    </div>

</div>
<!-- End of Main Content -->
@endsection

@section('styles')
<style>
    body {
        background: linear-gradient(135deg, #e0eafc, #cfdef3);
        background-size: 200% 200%;
        animation: backgroundAnimation 15s ease infinite;
        font-family: 'Roboto', sans-serif;
    }

    .error {
        background: radial-gradient(circle, rgba(255, 255, 255, 0.1), rgba(0, 0, 0, 0.1));
        border-radius: 50%;
        width: 120px;
        height: 120px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto;
        position: relative;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        animation: pulse 1.5s infinite;
    }

    .error .number {
        font-size: 4rem;
        font-weight: bold;
        color: #fff;
        z-index: 1;
    }

    .error .icon {
        position: absolute;
        bottom: -20px;
        right: -20px;
        opacity: 0.6;
        animation: rotate 3s linear infinite;
    }

    @keyframes pulse {
        0% {
            transform: scale(1);
        }

        50% {
            transform: scale(1.05);
        }

        100% {
            transform: scale(1);
        }
    }

    @keyframes rotate {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }

    @keyframes backgroundAnimation {
        0% {
            background-position: 0% 0%;
        }

        50% {
            background-position: 100% 100%;
        }

        100% {
            background-position: 0% 0%;
        }
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
        transition: all 0.3s ease;
        text-transform: uppercase;
        border-radius: 5px;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #004085;
        transform: translateY(-2px);
    }

    .btn-primary:active {
        transform: translateY(0);
    }
</style>
@endsection