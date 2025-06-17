<?php $__env->startSection('title', 'Add Grade - Rwanda Driving License'); ?>

<?php $__env->startSection('content'); ?>
    <div class="max-w-2xl mx-auto">
        <div class="bg-white rounded-lg shadow-sm p-6">
            <div class="mb-6">
                <h1 class="text-2xl font-bold text-gray-800">Add New Grade</h1>
                <p class="text-gray-600 mt-1">Enter the candidate's grade information</p>
            </div>

            <form action="<?php echo e(route('grade.register_grade')); ?>" method="POST" class="space-y-6">
                <?php echo csrf_field(); ?>
                
                <input type="hidden" name="candidateNationalId" value="<?php echo e($candidates->id); ?>" required>

                <!-- Candidate Info -->
                <div class="bg-gray-50 p-4 rounded-lg">
                    <div class="flex items-center space-x-3">
                        <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center">
                            <i class="fas fa-user text-blue-600"></i>
                        </div>
                        <div>
                            <input type="hidden" name="candidate_name"
                                value="<?php echo e($candidates->firstName); ?> <?php echo e($candidates->secondName); ?>">
                            <p class="text-sm font-medium text-gray-900">Candidate Information</p>
                            <p class="text-sm text-gray-500"><?php echo e($candidates->firstName); ?> <?php echo e($candidates->secondName); ?></p>
                        </div>
                    </div>
                </div>

                <!-- License Category -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">License Exam Category</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                            <i class="fas fa-id-card text-gray-400"></i>
                        </span>
                        <input type="text" name="licenseExamCategory" required
                            class="w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                            placeholder="Enter license category">
                    </div>
                </div>

                <!-- Marks -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Obtained Marks (out of 20)</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                            <i class="fas fa-star text-gray-400"></i>
                        </span>
                        <input type="number" name="obtainedmarks_20" required min="0" max="20"
                            class="w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                            placeholder="Enter marks">
                    </div>
                </div>

                <!-- Form Actions -->
                <div class="flex justify-end space-x-4 pt-6 border-t">
                    <a href="<?php echo e(route('grade')); ?>"
                        class="px-4 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50">
                        Cancel
                    </a>
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                        Add Grade
                    </button>
                </div>
                
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\Rwanda_Driving_License-main\resources\views/grade/form_grade.blade.php ENDPATH**/ ?>