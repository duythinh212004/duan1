<?php include '../views/admin/layout/header.php' ?>
<div class="page-content">

     <!-- Start Container Fluid -->
     <div class="container-xxl">

          <div class="row">

               <form action="?act=product-update&id=<?=$product['product_id']?>" method="post" enctype="multipart/form-data">
                    <div class="col-xl-9 col-lg-8 ">
                         <input type="hidden" name="product_id" value="<?=$product['product_id']?>">
                         <div class="card">
                              <div class="card-header">
                                   <h4 class="card-title">Thêm ảnh sản phẩm</h4>
                              </div>
                              <div class="card-body">
                                   <!-- File Upload nhiều ảnh sản phẩm-->
                                    <?php foreach($gallery as $value):?>
                                        <div class="image_gallery_container mt-1">
                                             <a href="?act=gallery-delete&gallery_id=<?=$value['product_gallery_Id']?>" class="remove_gallery" ><i class='bx bxs-x-circle bx-tada bx-rotate-90'></i></a>
                                        <img src="./images/product_gallery/<?=$value['image']?>" alt="" class=" mb-1 " width="100px">
                                       
                                   <input type="file" hidden name="gallery_image[]" id="" class="form-control" multiple>
                                   </div>
                              <?php endforeach; ?>
                              <input type="file" name="old_gallery_image[]" value="<?=$value['image']?>" id="" class="form-control" multiple>
                                   <?php if (isset($_SESSION['errors']['gallery_image'])): ?>
                                   <p class="text-danger"><?= $_SESSION['errors']['gallery_image'] ?></p>
                              <?php endif; ?>
                              </div>
                              
                         </div>
                         <div class="card">
                              <div class="card-header">
                                   <h4 class="card-title">Thông tin sản phẩm</h4>
                              </div>
                              <div class="card-body">
                                   <div class="row">
                                        <div class="col-lg-6">

                                             <div class="mb-3">
                                                  <label for="product-name" class="form-label">Tên sản phẩm</label>
                                                  <input type="text" id="product-name" name="product_name" value="<?=$product['product_name']?>"
                                                       class="form-control" onkeyup="ChangeToSlug()" placeholder="Nhập tên sản phẩm">
                                             </div>
                                             <?php if (isset($_SESSION['errors']['product_name'])): ?>
                                                  <p class="text-danger"><?= $_SESSION['errors']['product_name'] ?></p>
                                             <?php endif; ?>
                                        </div>
                                        <div class="col-lg-6">

                                             <label for="product-categories" class="form-label">Danh mục sản
                                                  phẩm</label>
                                             <select class="form-control" id="product-categories" name="category_id"
                                                  data-choices data-choices-groups data-placeholder="Chọn danh mục">
                                                  <?php foreach ($listCategories as $cate): ?>

                                                       <option value="<?= $cate['category_id'] ?>"
                                                         <?=$product['category_id'] == $cate['category_id']? 'selected' : ''?>
                                                       
                                                       
                                                       ><?= $cate['name'] ?></option>
                                                  <?php endforeach; ?>
                                             </select>

                                        </div>
                                        <div class="col-lg-6">
                                             <div class="mb-3">
                                             <label for="product-categories" class="form-label">Ảnh sản phẩm
                                             </label> </br>
                                             <img src="./images/product/<?=$product['product_image']?>" alt="" width="100px">
                                                  <input type="file" name="product_image" id="" class="form-control">
                                                  <input type="file" hidden name="old_product_image" value="<?=$product['product_image']?>" id="" class="form-control">
                                             </div>
                                             <?php if (isset($_SESSION['errors']['product_image'])): ?>
                                                  <p class="text-danger"><?= $_SESSION['errors']['product_image'] ?></p>
                                             <?php endif; ?>
                                        </div>
                                        <div class="col-lg-6">
                                             <div class="mb-3">
                                             <label for="product-categories" class="form-label">Đường dẫn
                                             </label>
                                                  <input type="text" value="<?=$product['product_slug']?>" name="product_slug" id="slug" class="form-control">
                                             </div>
                                             <?php if (isset($_SESSION['errors']['product_image'])): ?>
                                                  <p class="text-danger"><?= $_SESSION['errors']['product_image'] ?></p>
                                             <?php endif; ?>
                                        </div>
                                        <div class="col-lg-6">

                                             <div class="mb-3">
                                                  <label for="product_price" class="form-label">Giá sản phẩm</label>
                                                  <input type="text" value="<?=$product['product_price']?>" id="product_price" name="product_price"
                                                       class="form-control" placeholder="Nhập giá sản phẩm">
                                             </div>
                                             <?php if (isset($_SESSION['errors']['product_price'])): ?>
                                                  <p class="text-danger"><?= $_SESSION['errors']['product_price'] ?></p>
                                             <?php endif; ?>
                                        </div>
                                        <div class="col-lg-6">


                                             <div class="mb-3">
                                                  <label for="product_sale_price" class="form-label">Giá khuyến
                                                       mãi</label>
                                                  <input type="text" id="product_sale_price"value="<?=$product['product_sale_price']?>" name="product_sale_price"
                                                       class="form-control" placeholder="Nhập giá khuyến mãi...">
                                             </div>
                                             <?php if (isset($_SESSION['errors']['product_sale_price'])): ?>
                                                  <p class="text-danger"><?= $_SESSION['errors']['product_sale_price'] ?></p>
                                             <?php endif; ?>
                                        </div>
                                   </div>

                                  
                                   <div id="variants">
                                   <?php foreach($variants as $key =>$value):?>
                                        
                                        <div class="row mb-4 mt-3  border rounded px-2">
                                        <a href="?act=product-variant-delete&variant_id=<?=$value['product_variant_id']?>" class="d-flex justify-content-end mt-2"><i class='bx bx-x-circle'></i></a>
                                             <div class="col-lg-4">
                                                  <div class="mt-3 mb-3">
                                                       <input type="text" hidden name="product_variant_id[]" value="<?=$value['product_variant_id']?>">
                                                       <h5 class="text-dark fw-medium">Kích thước :</h5>
                                                       <div class="d-flex flex-wrap gap-2" role="group"
                                                            aria-label="Basic checkbox toggle button group">
                                                            <?php foreach ($listSizes as $size): ?>
                                                                 <input type="checkbox" class="btn-check"
                                                                      value="<?= $size['variant_size_Id'] ?>"
                                                                      <?=$value['variant_size_id'] == $size['variant_size_Id'] ? 'checked' : ''?>
                                                                      id="size-<?= $size['variant_size_Id'] ?>-<?=$key?>"
                                                                      name="variant_size[]">
                                                                 <label
                                                                      class="btn btn-light avatar-sm rounded d-flex justify-content-center align-items-center"
                                                                      for="size-<?= $size['variant_size_Id'] ?>-<?=$key?>"><?= $size['size_name'] ?></label>
                                                            <?php endforeach; ?>


                                                       </div>
                                                  </div>
                                                  <?php if (isset($_SESSION['errors']['variant_size'])): ?>
                                                       <p class="text-danger"><?= $_SESSION['errors']['variant_size'] ?></p>
                                                  <?php endif; ?>
                                             </div>
                                             <div class="col-lg-5">
                                                  <div class="mt-3 mb-3">
                                                       <h5 class="text-dark fw-medium">Màu :</h5>
                                                       <div class="d-flex flex-wrap gap-2" role="group"
                                                            aria-label="Basic checkbox toggle button group">
                                                            <?php foreach ($listColors as $color): ?>
                                                                 <input type="checkbox" class="btn-check"
                                                                      id="color-<?= $color['variant_color_Id'] ?>-<?=$key?>"
                                                                      value="<?= $color['variant_color_Id']?> " <?=$value['variant_color_id'] == $color['variant_color_Id'] ? 'checked' : ''?>
                                                                      name="variant_color[]">
                                                                 <label
                                                                      class="btn btn-light avatar-sm rounded d-flex justify-content-center align-items-center"
                                                                      for="color-<?= $color['variant_color_Id'] ?>-<?=$key?>"> <i
                                                                           class="bx bxs-circle fs-18 "
                                                                           style="color:<?= $color['color_code'] ?>"></i></label>
                                                            <?php endforeach; ?>


                                                       </div>
                                                  </div>
                                                  <?php if (isset($_SESSION['errors']['variant_color'])): ?>
                                                       <p class="text-danger"><?= $_SESSION['errors']['variant_color'] ?></p>
                                                  <?php endif; ?>
                                             </div>
                                             <div class="col-lg-3">


                                                  <div class="mt-3 mb-3">
                                                       <label for="variant_quantity[]" class="form-label"> Số lượng
                                                       </label>
                                                       <input type="text" id="variant_quantity[]" value="<?=$value['variant_quantity']?>"
                                                            name="variant_quantity[]" class="form-control"
                                                            placeholder="Nhập số lượng...">
                                                  </div>
                                                  <?php if (isset($_SESSION['errors']['variant_quantity'])): ?>
                                                  <?php foreach (($_SESSION['errors']['variant_quantity'])as $variant_quantity): ?>
                                                       <p class="text-danger"><?= $variant_quantity ?></p>
                                                  <?php endforeach; ?>
                                                  <?php endif; ?>
                                             </div>
                                             <div class="col-lg-6">

                                                  <div class="mb-2">
                                                       <label for="variant_price[]" class="form-label">Giá biến thể
                                                       </label>
                                                       <input type="text" id="variant_price" value="<?=$value['variant_price']?>" name="variant_price[]"
                                                            class="form-control"
                                                            placeholder="Nhập giá sản phẩm biến thể">
                                                  </div>
                                                  <?php if (isset($_SESSION['errors']['variant_price'])): ?>
                                                  <?php foreach (($_SESSION['errors']['variant_price'])as $variant_price): ?>
                                                       <p class="text-danger"><?= $variant_price ?></p>
                                                  <?php endforeach; ?>
                                                  <?php endif; ?>

                                             </div>
                                             <div class="col-lg-6">


                                                  <div class="mb-2">
                                                       <label for="variant_sale_price[]" class="form-label">Giá khuyến
                                                            mãi biến thể</label>
                                                       <input type="text" id="variant_sale_price"
                                                            name="variant_sale_price[]"
                                                            value="<?=$value['variant_sale_price']?>"
                                                            class="form-control"
                                                            placeholder="Nhập giá khuyến mãi...">
                                                  </div>
                                                  <?php if (isset($_SESSION['errors']['variant_sale_price'])): ?>
                                                  <?php foreach (($_SESSION['errors']['variant_sale_price'])as $variant_sale_price): ?>
                                                       <p class="text-danger"><?= $variant_sale_price ?></p>
                                                  <?php endforeach; ?>
                                                  <?php endif; ?>
                                             </div>

                                        </div>
                                        <?php endforeach;?>
                                   </div>
                                  

                                   <div class=" rounded">
                                        <div class="row justify-content-end g-2">
                                             <div class="col-lg-2">
                                                  <button type="button" id="add-variant"
                                                       class="btn btn-primary w-100">Thêm biến thể</button>
                                             </div>

                                        </div>
                                   </div>
                                   <div class="row">
                                        <div class="col-lg-12">
                                             <div class="mb-3">
                                                  <label for="description" class="form-label">Mô tả:</label>
                                                  <textarea class="form-control bg-light-subtle" id="description"
                                                       name="product_description" rows="7" placeholder="Nhập mô tả"
                                                       about the><?=$product['product_description']?></textarea>
                                             </div>
                                             <?php if (isset($_SESSION['errors']['product_description'])): ?>
                                                       <p class="text-danger"><?= $_SESSION['errors']['product_description'] ?></p>
                                                  <?php endif; ?>
                                        </div>
                                   </div>

                              </div>
                         </div>

                         <div class="p-3 bg-light mb-3 rounded">
                              <div class="row justify-content-end g-2">
                                   <div class="col-lg-2">
                                        <button type="submit" name="update-product"
                                             class="btn btn-outline-secondary w-100">Cập nhật sản phẩm</button>
                                   </div>
                                   <div class="col-lg-2">
                                        <a href="?act=product" class="btn btn-primary w-100">Quay lại</a>
                                   </div>
                              </div>
                         </div>
                    </div>
               </form>
          </div>
     </div>
     <!-- End Container Fluid -->
     <script>
          document.getElementById('add-variant').addEventListener('click', function () {
               const container = document.getElementById('variants');
               // tao ra 1 the div
               const newVariant = document.createElement('div');
               // them cac lop cho the div
               //     newVariant.classList.add('mb-4' ,'mt-3' , 'border' ,'rounded', 'px-2');

               newVariant.innerHTML = `
              <div class="row mb-4 mt-3  border rounded px-2">
                                                      <a href="" class="d-flex justify-content-end mt-2"><i class="bx bx-x-circle"></i></a>

                                        <div class="col-lg-4">
                                             <div class="mt-3 mb-3">
                                                  <h5 class="text-dark fw-medium">Kích thước :</h5>
                                                  <div class="d-flex flex-wrap gap-2" role="group"
                                                       aria-label="Basic checkbox toggle button group">
                                                       <?php foreach ($listSizes as $size): ?>
                                                            <input type="checkbox" class="btn-check" id="size-<?= $size['variant_size_Id'] ?>-${container.children.length}"
                                                            value="<?= $size['variant_size_Id'] ?>"
                                                                 name="variant_size[]">
                                                            <label
                                                                 class="btn btn-light avatar-sm rounded d-flex justify-content-center align-items-center"
                                                                 for="size-<?= $size['variant_size_Id'] ?>-${container.children.length}"><?= $size['size_name'] ?></label>
                                                            <?php endforeach; ?>


                                                  </div>
                                             </div>
                                        </div>
                                        <div class="col-lg-5">
                                             <div class="mt-3 mb-3">
                                                  <h5 class="text-dark fw-medium">Màu :</h5>
                                                  <div class="d-flex flex-wrap gap-2" role="group"
                                                       aria-label="Basic checkbox toggle button group">
                                                       <?php foreach ($listColors as $color): ?>
                                                            <input type="checkbox" class="btn-check" id="color-<?= $color['variant_color_Id'] ?>-${container.children.length}"
                                                            value="<?= $color['variant_color_Id'] ?>"
                                                                 name="variant_color[]">
                                                            <label
                                                                 class="btn btn-light avatar-sm rounded d-flex justify-content-center align-items-center"
                                                                 for="color-<?= $color['variant_color_Id'] ?>-${container.children.length}"> <i
                                                                      class="bx bxs-circle fs-18 " style="color:<?= $color['color_code'] ?>"></i></label>
                                                                 <?php endforeach; ?>


                                                  </div>
                                             </div>
                                        </div>
                                        <div class="col-lg-3">


                                             <div class="mt-3 mb-3">
                                                  <label for="variant_quantity[]" class="form-label"> Số lượng
                                                  </label>
                                                  <input type="text" id="variant_quantity[]" name="variant_quantity[]"
                                                       class="form-control" placeholder="Nhập giá khuyến mãi...">
                                             </div>

                                        </div>
                                        <div class="col-lg-6">

                                             <div class="mb-2">
                                                  <label for="variant_price[]" class="form-label">Giá biến thể </label>
                                                  <input type="text" id="variant_price[]" name="variant_price[]"
                                                       class="form-control" placeholder="Nhập giá sản phẩm">
                                             </div>

                                        </div>
                                        <div class="col-lg-6">


                                             <div class="mb-2">
                                                  <label for="variant_sale_price[]" class="form-label">Giá khuyến
                                                       mãi biến thể</label>
                                                  <input type="text" id="variant_sale_price[]"
                                                       name="variant_sale_price[]" class="form-control"
                                                       placeholder="Nhập giá khuyến mãi...">
                                             </div>

                                        </div>

                                   </div>
              `;
               //Them bien the moi
               container.appendChild(newVariant);
          })
     </script>


</div>
<?php 
unset($_SESSION['errors']);
include '../views/admin/layout/footer.php' ?>