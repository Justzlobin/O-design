@extends('app')

<style>
    .error_wrap {
        width: 100%;
        height: 100%;
        min-height: calc(100vh - var(--header-desktop-height));
    }
    .error_wrap p {
        color: var(--color-text-1);
    }
</style>

@section('content')
    <section class="error_wrap fx-row flex-center">
        <p>The page you requested cannot be found.</p>
    </section>
@endsection
