<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>
    <?php if($masterEvent){?>
    <div class="flex flex-wrap -mx-3">
        <div class="flex-none w-full max-w-full px-3">
        <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
            <div class="p-6 pb-0 mb-5 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                <div class="grid grid-cols-12 gap-4">
                <h6 class="col-span-6 font-bold text-xl"><?= $masterEvent[0]['title'];?> </h6>
                    <div class="col-span-6">
                        <form action="<?= base_url("/reminder"); ?>" method="post">
                        <?= csrf_field(); ?>
                            <label for="reminder">Pilih reminder: </label>
                            <input type="hidden" name="idEvents" value="<?= $masterEvent[0]['id'];?>">
                            <select id="selection" name="selection" class="w-1/3 mr-2.5 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5">
                                <option value="H-3">H-3</option>
                                <option value="Lolos">Lolos</option>
                                <option value="Tidak Lolos">Tidak Lolos</option>
                            </select>
                            <input class="inline-block w-1/3 px-6 py-3 font-bold text-center text-white align-middle transition-all ease-in border-0 rounded-lg select-none shadow-soft-md bg-150 bg-x-25 leading-pro text-xs bg-gradient-to-tl from-[#019267] to-[#FFD365]" type="submit" value="Kirim">
                        </form>
                    </div>
                </div>
                <a class="inline-block w-1/3 px-6 py-3 font-bold text-center text-white align-middle transition-all ease-in border-0 rounded-lg select-none shadow-soft-md bg-150 bg-x-25 leading-pro text-xs bg-gradient-to-tl from-[#019267] to-[#FFD365]" href='/exportData/<?= $masterEvent[0]['id']?>'>Export CSV</a>
                
            </div>
            <div class="flex-auto px-0 pt-0 pb-2">
            <div class="p-4 overflow-x-auto">
                <table class="items-center w-full mb-0 align-top border-gray-200 text-slate-500" id="myTable">
                <thead class="align-bottom">
                    <tr>
                        <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">No</th>
                        <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Nama</th>
                        <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Email</th>
                        <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Acara</th>
                        <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Status</th>
                        <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Status Pembayaran</th>
                        <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php   
                    $i = 1;
                    foreach($masterEvent as $data):?>
                <tr>
                    <tr>
                    <td class="p-2 align-middle text-center bg-transparent border-b whitespace-nowrap shadow-transparent">
                        <p class="mb-0 font-semibold leading-tight text-xs"><?= $i++ ?></p>
                    </td>
                    <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                        <p class="mb-0 font-semibold leading-tight text-xs"><?= $data['name'] ?></p>
                    </td>
                    <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                        <p class="mb-0 font-semibold leading-tight text-xs"><?= $data['email'] ?></p>
                    </td>
                    <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                        <p class="mb-0 font-semibold leading-tight text-xs"><?= $data['title'] ?></p>
                    </td>
                    <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                        <p class="mb-0 font-semibold leading-tight text-xs"><?php if($data['bima_registered']==1){ echo"Terdaftar"; }else { echo "Belum Terdaftar";} ?></p>
                    </td>
                    <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                        <p class="mb-0 font-semibold leading-tight text-xs"><?php if($data['payment_status']==1){ echo"Sudah Membayar"; }else { echo "Belum Membayar";} ?></p>
                    </td>
                    </td>
                    <td class="p-2 align-middle text-center bg-transparent border-b whitespace-nowrap shadow-transparent">
                        <a href="/bima_register/<?=$data['idEvent'] ?>" class="inline-block px-6 py-3 mr-3 font-bold text-center text-white uppercase align-middle transition-all bg-green-500 rounded-lg cursor-pointer leading-pro text-xs ease-soft-in tracking-tight-soft shadow-soft-md bg-150 bg-x-25 hover:scale-102 active:opacity-85 hover:shadow-soft-xs" onclick="return confirm('Apakah kamu yakin ?')"> Update Pembayaran </a>
                        <a href="/paid/<?=$data['idEvent'] ?>" class="inline-block px-6 py-3 mr-3 font-bold text-center text-white uppercase align-middle transition-all bg-red-500 rounded-lg cursor-pointer leading-pro text-xs ease-soft-in tracking-tight-soft shadow-soft-md bg-150 bg-x-25 hover:scale-102 active:opacity-85 hover:shadow-soft-xs" onclick="return confirm('Apakah kamu yakin ?')"> Daftar di BIMA </a>
                        <a href="/admin/events/<?=$data['idEvent'] ?>/edit" class="inline-block px-6 py-3 mr-3 font-bold text-center text-white uppercase align-middle transition-all bg-orange-500 rounded-lg cursor-pointer leading-pro text-xs ease-soft-in tracking-tight-soft shadow-soft-md bg-150 bg-x-25 hover:scale-102 active:opacity-85 hover:shadow-soft-xs"> Edit </a>
                        <a href="/admin/events/<?=$data['idEvent'] ?>/delete" class="inline-block px-6 py-3 mr-3 font-bold text-center text-white uppercase align-middle transition-all bg-red-500 rounded-lg cursor-pointer leading-pro text-xs ease-soft-in tracking-tight-soft shadow-soft-md bg-150 bg-x-25 hover:scale-102 active:opacity-85 hover:shadow-soft-xs"> Delete </a>
                    </td>
                    </tr>
                <?php endforeach;?>
                </tbody>
                </table>
            </div>
            </div>
        </div>
        </div>
    </div>
    <?php }else {?>
        <div class="flex flex-wrap -mx-3">
            <div class="flex-none w-full max-w-full px-3">
                <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
                    <div class="p-6 pb-0 mb-5 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                        <div class="grid grid-cols-12 gap-4">
                            <h6 class="col-span-6 font-bold text-xl">Data Empty</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php }?>
<?= $this->endSection() ?>