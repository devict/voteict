@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('subscribers.admin.new') }}" class="btn btn-success btn-sm float-right">New Subscriber</a>
                    Subscribers
                </div>

                <div class="card-body">
                  <table class="table">
                    <thead>
                        <tr>
                            <th>Subscriber Number</th>
                            <th>Subscribed?</th>
                            <th>Created</th>
                            <th>Updated</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach ($subscribers as $subscriber)
                        <tr>
                            <td>{{ $subscriber->number }}</td>
                            <td>{{ $subscriber->subscribed ? 'X' : '' }}</td>
                            <td>{{ $subscriber->created_at->format('m/d/Y') }}</td>
                            <td>{{ $subscriber->updated_at->format('m/d/Y') }}</td>
                            <td>
                                <a href="{{ route('subscribers.admin.edit', $subscriber) }}" class="btn btn-warning btn-sm">
                                    Edit
                                </a>
                                <a href="{{ route('subscribers.admin.destroy', $subscriber) }}" onclick="return confirm('Are you sure?');" class="btn btn-danger btn-sm">
                                    Delete
                                </a>
                            </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
