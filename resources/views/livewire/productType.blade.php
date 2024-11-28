<div>
    <h1>Product Type</h1>

    <button class="btn btn-primary mt-3" wire:click="create">
        <i class="fa fa-plus"></i>
        เพิ่มประเภทสินค้า
    </button>

    {{-- <form wire:submit="save">
        <div class="card">
            <div class="card-header">
                <div class="card-title">ประเภทสินค้า</div>
            </div>
            <div class="card-body">
                <div>Name</div>
                <input type="text" class="form-control" wire:model="name">
                <button type="submit" class="btn btn-primary mt-3">Save</button>
            </div>
        </div>
    </form> --}}

    <table class="table table-bordered table-striped mt-3">
        <thead>
            <tr>
                <th>Name</th>
                <th width="110px">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($productTypes as $productType)
                <tr>
                    <td>{{ $productType->name }}</td>
                    <td class="text-center">
                        <button class="btn btn-primary" wire:click="edit({{ $productType->id }})">
                            <i class="fa fa-pencil"></i>
                        </button>
                        <button class="btn btn-danger" wire:click="remove({{ $productType->id }})"
                            onclick="return confirm('Are you sure you want to delete?')">
                            <i class="fa fa-trash"></i>
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <x-modal wire:model="showModal" maxWidth="md"
        title="{{ isset($editing) ? 'แก้ไขประเภทสินค้า' : 'เพิ่มประเภทสินค้า' }}">
        <div class="px-3 py-3">

            <div class="mt-2">
                <div>Name</div>
                <input type="text" class="form-control" wire:model="name">
            </div>
        </div>

        <div class="px-6 py-4 bg-gray-100 text-right">
            <button type="button" class="btn btn-secondary" wire:click="$set('showModal', false)">
                <i class="fa fa-times me-2"></i>
                ยกเลิก
            </button>
            <button type="button" class="btn btn-primary" wire:click="save">
                <i class="fa fa-save me-2"></i>
                บันทึก
            </button>
        </div>


    </x-modal>
</div>
