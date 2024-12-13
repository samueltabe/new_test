@extends('layouts.admin')

@section('content')

<!-- BEGIN: Content -->
<div class="content">
    <h2 class="intro-y text-lg font-medium my-10">
        @if (isset($activity))
        Update Activity
        @else
        Add Activity
        @endif

    </h2>
    <div class="intro-y col-span-12 lg:col-span-6">
        <div class="intro-y box w-1/2">
            <div id="input" class="p-5">
                <div class="preview" style="display: block;">
                    <form action="{{ isset($activity) ? route('activities.update', $activity->id) : route('activities.store') }}" method="POST">
                        @csrf
                        @if(isset($activity))
                        @method('PUT')
                        @endif
                        <label for="name" class="form-label">Activity Name</label>
                        <input id="regular-form-1" value="{{ isset($activity)? $activity->name : '' }}" type="text" class="form-control" name="name">
                        <div class="mt-3">
                        <input type="hidden" name="" value="{{ isset($activity)? Auth::user()->id : '' }}">
                            <button class="btn btn-primary shadow-md mr-2">
                                {{ isset($activity) ? 'Update' : 'Submit' }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>


@endsection
