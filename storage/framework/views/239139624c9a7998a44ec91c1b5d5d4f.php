<div class="container mx-auto p-4">
    <!--[if BLOCK]><![endif]--><?php if($isPrinting): ?>
        <div>
            <h1 class="text-2xl font-bold mb-4"><?php echo e($selectedKota->namaKota); ?></h1>
            <p>Nama Pemimpin: <?php echo e($selectedKota->namaPemimpin); ?></p>
            <p>Tanggal Berdiri: <?php echo e($selectedKota->tglBerdiri); ?></p>
            <p>Jumlah Penduduk: <?php echo e($selectedKota->jmlPenduduk); ?></p>
            <p>Luas Wilayah: <?php echo e($selectedKota->luasWilayah); ?></p>
            <p>Jenis Kota: <?php echo e($selectedKota->jenisKota); ?></p>
            <p>Keunggulan: <?php echo e($selectedKota->keunggulan); ?></p>
            <button onclick="printContent()" class="bg-green-500 text-white px-3 py-1 rounded no-print">Print</button>
            <button wire:click="stopPrinting" class="bg-red-500 text-white px-3 py-1 rounded no-print">Close</button>
        </div>
    <?php else: ?>
        <h1 class="text-2xl font-bold mb-4 no-print">Kota List</h1>

        <ul class="list-disc pl-5 mb-4 no-print">
            <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $kota; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="flex justify-between items-center mb-2">
                    <span><?php echo e($item->namaKota); ?></span>
                    <div class="flex items-center justify-center gap-2">
                        <button wire:click="edit(<?php echo e($item->idKota); ?>)" class="bg-blue-500 text-white px-3 py-1 rounded">Edit</button>
                        <button wire:click="delete(<?php echo e($item->idKota); ?>)" class="bg-red-500 text-white px-3 py-1 rounded" onclick="return confirm('Are you sure you want to delete this item?');">Delete</button>
                        <button wire:click="print(<?php echo e($item->idKota); ?>)" class="bg-green-500 text-white px-3 py-1 rounded">Print</button>
                    </div>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
        </ul>

        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 no-print">
            <h2 class="text-xl font-bold mb-4"><?php echo e($isEditing ? 'Edit Kota' : 'Create Kota'); ?></h2>
    
            <form wire:submit.prevent="<?php echo e($isEditing ? 'update' : 'create'); ?>">
                <div class="mb-4">
                    <label for="namaKota" class="block text-gray-700 text-sm font-bold mb-2">Nama Kota:</label>
                    <input type="text" id="namaKota" wire:model="namaKota" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['namaKota'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500 text-sm"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                </div>
                <div class="mb-4">
                    <label for="namaPemimpin" class="block text-gray-700 text-sm font-bold mb-2">Nama Pemimpin:</label>
                    <input type="text" id="namaPemimpin" wire:model="namaPemimpin" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['namaPemimpin'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500 text-sm"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                </div>
                <div class="mb-4">
                    <label for="tglBerdiri" class="block text-gray-700 text-sm font-bold mb-2">Tanggal Berdiri:</label>
                    <input type="date" id="tglBerdiri" wire:model="tglBerdiri" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['tglBerdiri'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500 text-sm"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                </div>
                <div class="mb-4">
                    <label for="jmlPenduduk" class="block text-gray-700 text-sm font-bold mb-2">Jumlah Penduduk:</label>
                    <input type="number" id="jmlPenduduk" wire:model="jmlPenduduk" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['jmlPenduduk'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500 text-sm"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                </div>
                <div class="mb-4">
                    <label for="luasWilayah" class="block text-gray-700 text-sm font-bold mb-2">Luas Wilayah:</label>
                    <input type="number" step="0.01" id="luasWilayah" wire:model="luasWilayah" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['luasWilayah'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500 text-sm"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                </div>
                <div class="mb-4">
                    <label for="jenisKota" class="block text-gray-700 text-sm font-bold mb-2">Jenis Kota:</label>
                    <select id="jenisKota" wire:model="jenisKota" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        <option value="">--Select--</option>
                        <option value="Istimewa">Istimewa</option>
                        <option value="Otonom">Otonom</option>
                        <option value="Percontohan">Percontohan</option>
                    </select>
                    <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['jenisKota'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500 text-sm"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                </div>
                <div class="mb-4">
                    <label for="keunggulan" class="block text-gray-700 text-sm font-bold mb-2">Keunggulan:</label>
                    <textarea id="keunggulan" wire:model="keunggulan" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>
                    <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['keunggulan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500 text-sm"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                </div>
                <div class="flex items-center justify-between">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"><?php echo e($isEditing ? 'Update' : 'Create'); ?></button>
                    <button type="button" wire:click="resetForm" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Reset</button>
                </div>
            </form>
        </div>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
</div>

<script>
    function printContent() {
        window.print();
    }

    window.addEventListener('beforeprint', function () {
        Livewire.dispatch('stopPrinting');
    });
</script><?php /**PATH C:\Users\Dimas\uas-laravel\resources\views/livewire/base.blade.php ENDPATH**/ ?>