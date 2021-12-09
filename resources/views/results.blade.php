@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Results</div>

                <div class="card-body">
                    <table id="affiliatesTable">
                        <tr>
                            <th>S/N</th>
                            <th>Affiliate ID</th>
                            <th>Name</th>
                            <th>Distance From Office</th>
                        </tr>
                        @foreach($data as $affiliate)
                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td>{{ $affiliate['affiliate_id'] }}</td>
                                <td>{{ $affiliate['name'] }}</td>
                                <td>{{ $affiliate['distance_from_office'] }}</td>
                            </tr>
                        @endforeach
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
