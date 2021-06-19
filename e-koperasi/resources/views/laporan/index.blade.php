@extends('layouts.app')

@section('page-title', 'Laporan Keuangan')

@section('content-app')
<div class="row row-cards">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <td>
                    <div class="form-row">
                        <div class="col">
                            <input type="text" id="onlmonth" name="month" autocomplete="off" class="form-control" required placeholder="Bulan">
                        </div>
                        <div class="col">
                            <input type="text" id="onlyear" name="year" autocomplete="off" class="form-control" required placeholder="Tahun">
                        </div>
                        <div class="col-md-5">
                            <button id="btn-check-interest" class="btn btn-primary">Cek</button>
                        </div>
                    </div>
                </td>
            </div>
            <div class="table-responsive">
                <table class="table card-table table-vcenter text-nowrap datatable">

                    <thead>
                        <tr>
                            <th class="w-1">No.</th>
                            <th>Anggota ID</th>
                            <th>Tanggal</th>
                            <th>Keterangan</th>
                            <th class="text-right">Debet</th>
                            <th class="text-right">Kredit</th>
                            <th class="text-right">Saldo</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($mutations as $mutation)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <div>{{ $mutation->anggota_id }}</div>
                                </td>
                                <td>{{ $mutation->tanggal }}</td>
                                <td>{{ $mutation->keterangan }}</td>
                                <td class="text-right">{{ format_rupiah($mutation->debet) }}</td>
                                <td class="text-right">{{ format_rupiah($mutation->kredit) }}</td>
                                <td class="text-right">{{ format_rupiah($mutation->saldo) }}</td>
                                <td class="text-muted">{{ $mutation->created_at }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7">Data tidak ditemukan.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
