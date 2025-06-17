@extends('layouts.app')

@section('title', 'Update Candidate - Rwanda Driving License')

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="bg-white rounded-lg shadow-sm p-6">
        <div class="mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Update Candidate</h1>
            <p class="text-gray-600 mt-1">Modify candidate information</p>
        </div>

        <form action="{{ route('candidate.update_candidate', $edit_candidate->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- First Name -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">First Name</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                            <i class="fas fa-user text-gray-400"></i>
                        </span>
                        <input type="text" 
                               name="firstName" 
                               value="{{ $edit_candidate->firstName }}"
                               required
                               class="w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                               placeholder="Enter first name">
                    </div>
                </div>

                <!-- Second Name -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Second Name</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                            <i class="fas fa-user text-gray-400"></i>
                        </span>
                        <input type="text" 
                               name="secondName" 
                               value="{{ $edit_candidate->secondName }}"
                               required
                               class="w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                               placeholder="Enter second name">
                    </div>
                </div>

                <!-- Gender -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Gender</label>
                    <div class="flex space-x-4">
                        <label class="inline-flex items-center">
                            <input type="radio" 
                                   name="gender" 
                                   value="Male" 
                                   {{ $edit_candidate->gender === 'Male' ? 'checked' : '' }}
                                   required
                                   class="form-radio text-blue-600">
                            <span class="ml-2">Male</span>
                        </label>
                        <label class="inline-flex items-center">
                            <input type="radio" 
                                   name="gender" 
                                   value="Female" 
                                   {{ $edit_candidate->gender === 'Female' ? 'checked' : '' }}
                                   required
                                   class="form-radio text-blue-600">
                            <span class="ml-2">Female</span>
                        </label>
                    </div>
                </div>

                <!-- Date of Birth -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Date of Birth</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                            <i class="fas fa-calendar text-gray-400"></i>
                        </span>
                        <input type="date" 
                               name="dof" 
                               value="{{ $edit_candidate->dof }}"
                               required
                               class="w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    </div>
                </div>

                <!-- Exam Date -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Exam Date</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                            <i class="fas fa-calendar-alt text-gray-400"></i>
                        </span>
                        <input type="date" 
                               name="examDate" 
                               value="{{ $edit_candidate->examDate }}"
                               required
                               class="w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    </div>
                </div>

                <!-- Phone Number -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Phone Number</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                            <i class="fas fa-phone text-gray-400"></i>
                        </span>
                        <input type="number" 
                               name="phoneNumber" 
                               value="{{ $edit_candidate->phoneNumber }}"
                               required
                               class="w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                               placeholder="Enter phone number">
                    </div>
                </div>
            </div>

            <!-- Form Actions -->
            <div class="flex justify-end space-x-4 pt-6 border-t">
                <a href="{{ route('candidate') }}" 
                   class="px-4 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50">
                    Cancel
                </a>
                <button type="submit" 
                        class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                    Update Candidate
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
