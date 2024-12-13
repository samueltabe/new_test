@extends('layouts.admin')

@section('content')

<!-- BEGIN: Content -->
<div class="content">
    <h2 class="intro-y text-lg font-medium my-10">
        @if (isset($task))
        Update Task
        @else
        Add Task
        @endif

    </h2>
    <div class="intro-y col-span-12 lg:col-span-6">
        <div class="intro-y box w-1/2">
            <div id="input" class="p-5">
                <div class="preview" style="display: block;">
                    <form action="{{ isset($task) ? route('tasks.update', $task->id) : route('tasks.store') }}" method="POST">
                        @csrf
                        @if(isset($task))
                        @method('PUT')
                        @endif
                        <div>
                            <label for="name" class="form-label">Name Name</label>
                            <input id="regular-form-1" value="{{ isset($task)? $task->name : '' }}" type="text" class="form-control" name="name">
                        </div>
                        <div>
                            <label for="name" class="form-label">Description</label>
                            <input id="regular-form-1" value="{{ isset($task)? $task->description : '' }}" type="text" class="form-control" name="description">
                        </div>
                        <div class="my-4">
                            <label for="activity_id" class="">Select Activity</label>
                            <select name="activity_id" id="activity_id" class="form-control">
                                <option value=""></option>
                                @foreach ($activities as $activity)
                                    <option value="{{ $activity->id }}" {{ isset($task) && $activity->id == $task->activity_id ? 'selected' : '' }}>
                                        {{ $activity->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mt-3">
                        {{-- <input type="hidden" name="" value="{{ isset($task)? Auth::user()->id : '' }}"> --}}
                            <button class="btn btn-primary shadow-md mr-2">
                                {{ isset($task) ? 'Update' : 'Submit' }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>


@endsection
t
a
s
k
