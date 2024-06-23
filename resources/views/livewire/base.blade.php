<div class="container mx-auto p-4">
    @if($isPrinting)
        <div>
            <h1 class="text-2xl font-bold mb-4">{{ $selectedKota->namaKota }}</h1>
            <p>Nama Pemimpin: {{ $selectedKota->namaPemimpin }}</p>
            <p>Tanggal Berdiri: {{ $selectedKota->tglBerdiri }}</p>
            <p>Jumlah Penduduk: {{ $selectedKota->jmlPenduduk }}</p>
            <p>Luas Wilayah: {{ $selectedKota->luasWilayah }}</p>
            <p>Jenis Kota: {{ $selectedKota->jenisKota }}</p>
            <p>Keunggulan: {{ $selectedKota->keunggulan }}</p>
            <button onclick="printContent()" class="bg-green-500 text-white px-3 py-1 rounded no-print">Print</button>
            <button wire:click="stopPrinting" class="bg-red-500 text-white px-3 py-1 rounded no-print">Close</button>
        </div>
    @else
        <h1 class="text-2xl font-bold mb-4 no-print">Kota List</h1>

        <ul class="list-disc pl-5 mb-4 no-print">
            @foreach($kota as $item)
                <li class="flex justify-between items-center mb-2">
                    <span>{{ $item->namaKota }}</span>
                    <div class="flex items-center justify-center gap-2">
                        <button wire:click="edit({{ $item->idKota }})" class="bg-blue-500 text-white px-3 py-1 rounded">Edit</button>
                        <button wire:click="delete({{ $item->idKota }})" class="bg-red-500 text-white px-3 py-1 rounded" onclick="return confirm('Are you sure you want to delete this item?');">Delete</button>
                        <button wire:click="print({{ $item->idKota }})" class="bg-green-500 text-white px-3 py-1 rounded">Print</button>
                    </div>
                </li>
            @endforeach
        </ul>

        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 no-print">
            <h2 class="text-xl font-bold mb-4">{{ $isEditing ? 'Edit Kota' : 'Create Kota' }}</h2>
    
            <form wire:submit.prevent="{{ $isEditing ? 'update' : 'create' }}">
                <div class="mb-4">
                    <label for="namaKota" class="block text-gray-700 text-sm font-bold mb-2">Nama Kota:</label>
                    <input type="text" id="namaKota" wire:model="namaKota" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    @error('namaKota') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
                <div class="mb-4">
                    <label for="namaPemimpin" class="block text-gray-700 text-sm font-bold mb-2">Nama Pemimpin:</label>
                    <input type="text" id="namaPemimpin" wire:model="namaPemimpin" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    @error('namaPemimpin') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
                <div class="mb-4">
                    <label for="tglBerdiri" class="block text-gray-700 text-sm font-bold mb-2">Tanggal Berdiri:</label>
                    <input type="date" id="tglBerdiri" wire:model="tglBerdiri" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    @error('tglBerdiri') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
                <div class="mb-4">
                    <label for="jmlPenduduk" class="block text-gray-700 text-sm font-bold mb-2">Jumlah Penduduk:</label>
                    <input type="number" id="jmlPenduduk" wire:model="jmlPenduduk" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    @error('jmlPenduduk') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
                <div class="mb-4">
                    <label for="luasWilayah" class="block text-gray-700 text-sm font-bold mb-2">Luas Wilayah:</label>
                    <input type="number" step="0.01" id="luasWilayah" wire:model="luasWilayah" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    @error('luasWilayah') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
                <div class="mb-4">
                    <label for="jenisKota" class="block text-gray-700 text-sm font-bold mb-2">Jenis Kota:</label>
                    <select id="jenisKota" wire:model="jenisKota" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        <option value="">--Select--</option>
                        <option value="Istimewa">Istimewa</option>
                        <option value="Otonom">Otonom</option>
                        <option value="Percontohan">Percontohan</option>
                    </select>
                    @error('jenisKota') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
                <div class="mb-4">
                    <label for="keunggulan" class="block text-gray-700 text-sm font-bold mb-2">Keunggulan:</label>
                    <textarea id="keunggulan" wire:model="keunggulan" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>
                    @error('keunggulan') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
                <div class="flex items-center justify-between">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">{{ $isEditing ? 'Update' : 'Create' }}</button>
                    <button type="button" wire:click="resetForm" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Reset</button>
                </div>
            </form>
        </div>
    @endif
</div>

<script>
    function printContent() {
        window.print();
    }

    window.addEventListener('beforeprint', function () {
        Livewire.dispatch('stopPrinting');
    });
</script>