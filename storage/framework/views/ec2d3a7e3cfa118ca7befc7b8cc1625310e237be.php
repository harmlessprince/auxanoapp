<?php $__env->startSection('page'); ?>
    Update Ticket
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    
    <div class="flex flex-col w-3/4 mx-auto bg-white rounded-lg shadow-xl dark:bg-gray-800 p-5">
        <form method="POST" action="<?php echo e(route('tickets.update', ['ticket' => $ticket])); ?>">
            <?php echo method_field('PATCH'); ?>
            <?php echo csrf_field(); ?>
            <div class="flex flex-wrap -mx-3 mb-3">
                <div class="w-full px-3 mb-3">
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.label','data' => ['for' => 'subject','value' => __('Ticket Name')]]); ?>
<?php $component->withName('label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['for' => 'subject','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Ticket Name'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.input','data' => ['id' => 'ticket_name','class' => 'block mt-1 w-full','type' => 'text','name' => 'ticket_name','value' => ''.e($ticket->subject).'','required' => true,'autofocus' => true,'placeholder' => '']]); ?>
<?php $component->withName('input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['id' => 'ticket_name','class' => 'block mt-1 w-full','type' => 'text','name' => 'ticket_name','value' => ''.e($ticket->subject).'','required' => true,'autofocus' => true,'placeholder' => '']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginal89519ced6d59f4f150433967f10a186198f86891 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\InputError::class, ['message' => '$message','name' => 'ticket_name']); ?>
<?php $component->withName('input-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal89519ced6d59f4f150433967f10a186198f86891)): ?>
<?php $component = $__componentOriginal89519ced6d59f4f150433967f10a186198f86891; ?>
<?php unset($__componentOriginal89519ced6d59f4f150433967f10a186198f86891); ?>
<?php endif; ?>
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-3">
                <?php echo e($errors); ?>

                <!-- status -->
                
                <div class="w-1/3 px-3 mb-3 hidden">
                    <input type="text" class="hidden" name="priority" value="<?php echo e($ticket->priority_id); ?>">
                    <input type="text" class="hidden" name="status" value="<?php echo e($ticket->status_id); ?>">
                    <input type="text" class="hidden" name="assign_to_agent" value="<?php echo e($ticket->agent_id); ?>">
                    <input type="text" class="hidden" name="assign_to_technician"
                        value="<?php echo e($ticket->technician_id); ?>">
                    <input type="text" class="hidden" name="brand" value="<?php echo e($ticket->item->brand_id); ?>">
                    
                </div>
                <div class="w-full px-3 mb-3">
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.label','data' => ['for' => 'category','value' => __('Category')]]); ?>
<?php $component->withName('label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['for' => 'category','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Category'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginal9664ac210be45add4be058f3177c16028511e71a = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Select::class, []); ?>
<?php $component->withName('select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['required' => true,'name' => 'category']); ?>
                        <option value="" class="uppercase">---Select Category---</option>
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($item->id); ?>" <?php if($item->id == $ticket->category_id): ?> selected <?php endif; ?>>
                                <?php echo e($item->name); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9664ac210be45add4be058f3177c16028511e71a)): ?>
<?php $component = $__componentOriginal9664ac210be45add4be058f3177c16028511e71a; ?>
<?php unset($__componentOriginal9664ac210be45add4be058f3177c16028511e71a); ?>
<?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginal89519ced6d59f4f150433967f10a186198f86891 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\InputError::class, ['message' => '$message','name' => 'category']); ?>
<?php $component->withName('input-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal89519ced6d59f4f150433967f10a186198f86891)): ?>
<?php $component = $__componentOriginal89519ced6d59f4f150433967f10a186198f86891; ?>
<?php unset($__componentOriginal89519ced6d59f4f150433967f10a186198f86891); ?>
<?php endif; ?>
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-3">
                <!-- status -->
                <div class="w-full px-3 mb-3">
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.label','data' => ['for' => 'customer','value' => __('Customer')]]); ?>
<?php $component->withName('label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['for' => 'customer','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Customer'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginal9664ac210be45add4be058f3177c16028511e71a = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Select::class, []); ?>
<?php $component->withName('select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['required' => true,'name' => 'customer']); ?>
                        <option value="" class="">---Select---</option>
                        <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($item->id); ?>" <?php if($item->id == $ticket->customer_id): ?> selected <?php endif; ?>>
                                <?php echo e($item->name); ?> -------- <?php echo e($item->email); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9664ac210be45add4be058f3177c16028511e71a)): ?>
<?php $component = $__componentOriginal9664ac210be45add4be058f3177c16028511e71a; ?>
<?php unset($__componentOriginal9664ac210be45add4be058f3177c16028511e71a); ?>
<?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginal89519ced6d59f4f150433967f10a186198f86891 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\InputError::class, ['message' => '$message','name' => 'customer']); ?>
<?php $component->withName('input-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal89519ced6d59f4f150433967f10a186198f86891)): ?>
<?php $component = $__componentOriginal89519ced6d59f4f150433967f10a186198f86891; ?>
<?php unset($__componentOriginal89519ced6d59f4f150433967f10a186198f86891); ?>
<?php endif; ?>
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-3">
                <div class="w-1/2 px-3 mb-3">
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.label','data' => ['for' => 'brand','value' => __('Brand')]]); ?>
<?php $component->withName('label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['for' => 'brand','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Brand'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginal9664ac210be45add4be058f3177c16028511e71a = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Select::class, []); ?>
<?php $component->withName('select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['required' => true,'name' => 'brand']); ?>
                        <option value="" class="">---Select Brand ---</option>
                        <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($item->id); ?>" <?php if($ticket->item->brand_id == $item->id): ?> selected <?php endif; ?>><?php echo e($item->name); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9664ac210be45add4be058f3177c16028511e71a)): ?>
<?php $component = $__componentOriginal9664ac210be45add4be058f3177c16028511e71a; ?>
<?php unset($__componentOriginal9664ac210be45add4be058f3177c16028511e71a); ?>
<?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginal89519ced6d59f4f150433967f10a186198f86891 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\InputError::class, ['message' => '$message','name' => 'brand']); ?>
<?php $component->withName('input-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal89519ced6d59f4f150433967f10a186198f86891)): ?>
<?php $component = $__componentOriginal89519ced6d59f4f150433967f10a186198f86891; ?>
<?php unset($__componentOriginal89519ced6d59f4f150433967f10a186198f86891); ?>
<?php endif; ?>
                </div>
                <div class="w-1/2 px-3 mb-3">
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.label','data' => ['for' => 'model','value' => __('Model')]]); ?>
<?php $component->withName('label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['for' => 'model','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Model'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.input','data' => ['id' => 'model','class' => 'block mt-1 w-full','type' => 'text','name' => 'model','value' => ''.e($ticket->item->model).'','required' => true,'placeholder' => 'Latitude E77450']]); ?>
<?php $component->withName('input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['id' => 'model','class' => 'block mt-1 w-full','type' => 'text','name' => 'model','value' => ''.e($ticket->item->model).'','required' => true,'placeholder' => 'Latitude E77450']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginal89519ced6d59f4f150433967f10a186198f86891 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\InputError::class, ['message' => '$message','name' => 'model']); ?>
<?php $component->withName('input-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal89519ced6d59f4f150433967f10a186198f86891)): ?>
<?php $component = $__componentOriginal89519ced6d59f4f150433967f10a186198f86891; ?>
<?php unset($__componentOriginal89519ced6d59f4f150433967f10a186198f86891); ?>
<?php endif; ?>
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-3">
                <div class="w-full px-3 mb-3">
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.label','data' => ['for' => 'serial_number','value' => __('Serial Number')]]); ?>
<?php $component->withName('label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['for' => 'serial_number','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Serial Number'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.input','data' => ['id' => 'serial_number','class' => 'block mt-1 w-full','type' => 'text','name' => 'serial_number','value' => ''.e($ticket->item->serial_number).'','required' => true,'placeholder' => 'NP39202028']]); ?>
<?php $component->withName('input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['id' => 'serial_number','class' => 'block mt-1 w-full','type' => 'text','name' => 'serial_number','value' => ''.e($ticket->item->serial_number).'','required' => true,'placeholder' => 'NP39202028']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginal89519ced6d59f4f150433967f10a186198f86891 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\InputError::class, ['message' => '$message','name' => 'serial_number']); ?>
<?php $component->withName('input-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal89519ced6d59f4f150433967f10a186198f86891)): ?>
<?php $component = $__componentOriginal89519ced6d59f4f150433967f10a186198f86891; ?>
<?php unset($__componentOriginal89519ced6d59f4f150433967f10a186198f86891); ?>
<?php endif; ?>
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-3">
                <div class="w-1/2 px-3 mb-3">
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.label','data' => ['for' => 'drive_size','value' => __('Drive Size(256GB)')]]); ?>
<?php $component->withName('label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['for' => 'drive_size','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Drive Size(256GB)'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.input','data' => ['id' => 'drive_size','class' => 'block mt-1 w-full','type' => 'text','name' => 'drive_size','value' => ''.e($ticket->item->drive_size).'','placeholder' => '256GB']]); ?>
<?php $component->withName('input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['id' => 'drive_size','class' => 'block mt-1 w-full','type' => 'text','name' => 'drive_size','value' => ''.e($ticket->item->drive_size).'','placeholder' => '256GB']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginal89519ced6d59f4f150433967f10a186198f86891 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\InputError::class, ['message' => '$message','name' => 'drive_size']); ?>
<?php $component->withName('input-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal89519ced6d59f4f150433967f10a186198f86891)): ?>
<?php $component = $__componentOriginal89519ced6d59f4f150433967f10a186198f86891; ?>
<?php unset($__componentOriginal89519ced6d59f4f150433967f10a186198f86891); ?>
<?php endif; ?>
                </div>
                <div class="w-1/2 px-3 mb-3">
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.label','data' => ['for' => 'ram_size','value' => __('Ram Size(4GB)')]]); ?>
<?php $component->withName('label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['for' => 'ram_size','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Ram Size(4GB)'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.input','data' => ['id' => 'v','class' => 'block mt-1 w-full','type' => 'text','name' => 'ram_size','value' => ''.e($ticket->item->ram_size).'','placeholder' => '4GB']]); ?>
<?php $component->withName('input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['id' => 'v','class' => 'block mt-1 w-full','type' => 'text','name' => 'ram_size','value' => ''.e($ticket->item->ram_size).'','placeholder' => '4GB']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginal89519ced6d59f4f150433967f10a186198f86891 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\InputError::class, ['message' => '$message','name' => 'ram_size']); ?>
<?php $component->withName('input-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal89519ced6d59f4f150433967f10a186198f86891)): ?>
<?php $component = $__componentOriginal89519ced6d59f4f150433967f10a186198f86891; ?>
<?php unset($__componentOriginal89519ced6d59f4f150433967f10a186198f86891); ?>
<?php endif; ?>
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-3">
                <div class="w-full px-3 mb-3">
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.label','data' => ['for' => 'fault_reported','value' => __('Fault Reported')]]); ?>
<?php $component->withName('label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['for' => 'fault_reported','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Fault Reported'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    <textarea name="fault_reported"
                        class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                        rows="3" placeholder="Windows not booting"><?php echo e($ticket->fault_reported); ?></textarea>
                    <?php if (isset($component)) { $__componentOriginal89519ced6d59f4f150433967f10a186198f86891 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\InputError::class, ['message' => '$message','name' => 'fault_reported']); ?>
<?php $component->withName('input-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal89519ced6d59f4f150433967f10a186198f86891)): ?>
<?php $component = $__componentOriginal89519ced6d59f4f150433967f10a186198f86891; ?>
<?php unset($__componentOriginal89519ced6d59f4f150433967f10a186198f86891); ?>
<?php endif; ?>
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-3">
                <div class="w-full px-3 mb-3">
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.label','data' => ['for' => 'fault_observed','value' => __('Fault Observed')]]); ?>
<?php $component->withName('label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['for' => 'fault_observed','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Fault Observed'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    <textarea name="fault_observed"
                        class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                        rows="3" placeholder="Broken Screen"><?php echo e($ticket->fault_observed); ?></textarea>
                    <?php if (isset($component)) { $__componentOriginal89519ced6d59f4f150433967f10a186198f86891 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\InputError::class, ['message' => '$message','name' => 'fault_observed']); ?>
<?php $component->withName('input-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal89519ced6d59f4f150433967f10a186198f86891)): ?>
<?php $component = $__componentOriginal89519ced6d59f4f150433967f10a186198f86891; ?>
<?php unset($__componentOriginal89519ced6d59f4f150433967f10a186198f86891); ?>
<?php endif; ?>
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-3">
                <!-- status -->
                <div class="w-full px-3 mb-3">
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.label','data' => ['for' => 'due_date','value' => __('Due Date')]]); ?>
<?php $component->withName('label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['for' => 'due_date','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Due Date'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.input','data' => ['id' => 'due_date','class' => 'block mt-1 w-full','type' => 'date','name' => 'due_date','value' => ''.e($ticket->due_at).'','required' => true,'autofocus' => true,'placeholder' => '','min' => ' '.e(date('Y-m-d')).'']]); ?>
<?php $component->withName('input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['id' => 'due_date','class' => 'block mt-1 w-full','type' => 'date','name' => 'due_date','value' => ''.e($ticket->due_at).'','required' => true,'autofocus' => true,'placeholder' => '','min' => ' '.e(date('Y-m-d')).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginal89519ced6d59f4f150433967f10a186198f86891 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\InputError::class, ['message' => '$message','name' => 'due_date']); ?>
<?php $component->withName('input-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal89519ced6d59f4f150433967f10a186198f86891)): ?>
<?php $component = $__componentOriginal89519ced6d59f4f150433967f10a186198f86891; ?>
<?php unset($__componentOriginal89519ced6d59f4f150433967f10a186198f86891); ?>
<?php endif; ?>
                </div>
            </div>
            <div class="mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                    Is charger included ?
                </span>
                <div class="mt-2">
                    <label class="inline-flex items-center text-gray-600 dark:text-gray-400">
                        <input type="radio"
                            class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                            name="charger" value="1" <?php echo e($ticket->item->charger ? 'checked' : ''); ?>>
                        <span class="ml-2">Yes charger is included</span>
                    </label>
                    <label class="inline-flex items-center ml-6 text-gray-600 dark:text-gray-400">
                        <input type="radio"
                            class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                            name="charger" value="0" <?php echo e($ticket->item->charger ? '' : 'checked'); ?>>
                        <span class="ml-2">No charger is not included</span>
                    </label>
                </div>
            </div>
            <div class="flex justify-end">
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.button','data' => []]); ?>
<?php $component->withName('button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
                    Update
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
            </div>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/harmlessprince/web projects/laravel/auxanoapp/resources/views/tickets/edit.blade.php ENDPATH**/ ?>