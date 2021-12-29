@extends('layouts.dashboard')

@section('title')
    Store Dashboard Transactions Details
@endsection

@section('content')
<div
class="section-content section-dashboard-home"
data-aos="fade-up"
>
<div class="container-fluid">
  <div class="dashboard-heading">
    <h2 class="dashboard-title">Transactions</h2>
    <p class="dashboard-subtitle">Look what you have made today</p>
  </div>
  <div class="dashboard-content">
    <div class="row">
      <div class="col-12 mt-2">
        <ul
          class="nav nav-pills mb-3"
          id="pills-tab"
          role="tablist"
        >
          <li class="nav-item" role="presentation">
            <a
              class="nav-link active"
              id="pills-home-tab"
              data-toggle="pill"
              href="#pills-home"
              role="tab"
              aria-controls="pills-home"
              aria-selected="true"
              >Sell Product</a
            >
          </li>
          <li class="nav-item" role="presentation">
            <a
              class="nav-link"
              id="pills-profile-tab"
              data-toggle="pill"
              href="#pills-profile"
              role="tab"
              aria-controls="pills-profile"
              aria-selected="false"
              >Buy Product</a
            >
          </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
          <div
            class="tab-pane fade show active"
            id="pills-home"
            role="tabpanel"
            aria-labelledby="pills-home-tab"
          >
          @foreach ($sellTransactions as $transaksi)
            <a
              href="{{ route('dashboard-transactions-details', $transaksi->id) }}"
              class="card card-list d-block"
              ><div class="card-body">
                <div class="row">
                  <div class="col-md-1">
                    <img
                      src="{{ Storage::url($transaksi->product->galleries->first()->photos ?? '') }}"
                      class="w-50"
                      alt=""
                    />
                  </div>
                  <div class="col-md-4">{{ $transaksi->product->name }}</div>
                  <div class="col-md-3">{{ $transaksi->product->user->store_name }}</div>
                  <div class="col-md-3">{{ $transaksi->created_at }}</div>
                  <div class="col-md-1 d-none d-md-dblock">
                    <img
                      src="/images/dashboard-right-arrow.svg"
                      alt=""
                    />
                  </div>
                </div></div
            ></a>
          @endforeach
          </div>
          <div
            class="tab-pane fade"
            id="pills-profile"
            role="tabpanel"
            aria-labelledby="pills-profile-tab"
          >
            @foreach ($buyTransactions as $transaksi)
            <div
              {{-- href="{{ route('dashboard-transactions-details', $transaksi->id) }}" --}}
              href="#"
              class="card card-list d-block"
              ><div class="card-body">
                <div class="row">
                  <div class="col-md-1">
                    <img
                      src="{{ Storage::url($transaksi->product->galleries->first()->photos ?? '') }}"
                      class="w-50"
                      alt=""
                    />
                  </div>
                  <div class="col-md-4">{{ $transaksi->product->name }}</div>
                  <div class="col-md-3">{{ $transaksi->product->user->store_name }}</div>
                  <div class="col-md-3">{{ $transaksi->created_at }}</div>
                  <div class="col-md-1 d-none d-md-dblock">
                    <img
                      src="/images/dashboard-right-arrow.svg"
                      alt=""
                    />
                  </div>
                </div></div
            ></div>
          @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
@endsection

@push('addon-script')
<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
<script>
  CKEDITOR.replace("editor");
</script>
<script>
  function thisFileUpload() {
    document.getElementById("file").click();
  }
</script>
@endpush