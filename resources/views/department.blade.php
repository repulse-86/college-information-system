@extends('layouts.app')

@section('content')
    <div class="mx-auto p-6 space-y-6">
        <div class="bg-white shadow-md rounded-xl p-8 border border-gray-300">
            <h2 class="text-3xl font-semibold text-start text-gray-900 mb-6">Department Registration</h2>
            <form action="{{ route('departments.store') }}" method="POST" class="space-y-6">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="name" class="block text-lg font-medium text-gray-700">Department Name</label>
                        <input type="text" name="name" id="name" value="{{ old('name') }}"
                            class="block w-full h-12 px-6 rounded-lg border border-gray-300 bg-gray-50 text-gray-800 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300">
                        @error('name')
                            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="office" class="block text-lg font-medium text-gray-700">Office</label>
                        <input type="text" name="office" id="office" value="{{ old('office') }}"
                            class="block w-full h-12 px-6 rounded-lg border border-gray-300 bg-gray-50 text-gray-800 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300">
                        @error('office')
                            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div>
                    <button type="submit"
                        class="w-full h-12 bg-blue-600 text-white text-lg font-semibold rounded-lg hover:bg-blue-700 transition duration-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        Register Department
                    </button>
                </div>
            </form>
        </div>

        <x-dynamic-table :columns="['name', 'office']" :rows="$departments" />
    </div>
@endsection
