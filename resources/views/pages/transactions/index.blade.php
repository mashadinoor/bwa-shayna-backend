@extends('layouts.default')

@section('content')
  <div class="orders">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <h4 class="box-title">Daftar Transaksi Masuk</h4>
          </div>
          <div class="card-body--">
            <div class="table-stats order-table ov-h">
              <table class="table">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Nomor</th>
                    <th>Total Transaksi</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse ($items as $item)
                  <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->emaik }}</td>
                    <td>{{ $item->number }}</td>
                    <td>${{ $item->transaction_total }}</td>
                    <td>
                      @if($item->transaction_status == 'PENDING')
                        <span class="badge badge-info">
                      @elseif($item->transaction_status == 'SUCCESS')
                        <span class="badge badge-success">
                      @elseif($item->transaction_status == 'FAILED')
                        <span class="badge badge-info">
                      @else
                        <span>
                      @endif
                        {{ $item->transaction_status }}
                        </span>
                    </td>
                    <td>
                      <a href="{{ route('products.edit', $item->id)  }}" class="btn btn-primary btn-sm">
                      {{-- <a href="#" class="btn btn-primary btn-sm"> --}}
                        <i class="fa fa-pencil"></i>
                      </a>
                      <form action="{{ route('products.destroy', $item->id) }}" 
                            method="post"
                            class="d-inline">
                      {{-- <form action="#" method="post" class="d-inline"> --}}
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger btn-sm">
                          <i class="fa fa-trash"></i>
                        </button>
                      </form>
                    </th>
                  </tr>
                  @empty
                  <tr>
                    <td colspan="6" class="text-center p-5">
                      Data Tidak Tersedia
                    </td>
                  </tr>
                      
                  @endforelse
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection