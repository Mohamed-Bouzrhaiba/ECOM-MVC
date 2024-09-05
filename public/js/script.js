function getProductCategory($id){
    const input = document.querySelector('#category_id');
    const form = document.querySelector('#product_category_form');
    input.value =  $id;
    form.submit();
}
function submitForm($id){
    const input = document.querySelector('#product_id');
    const form = document.querySelector('#form');
    input.value =  $id;
    form.submit();
}
function deleteForm($id){
    const input = document.querySelector("#delete_product_id");
    const form = document.querySelector("#d_form");
    input.value = $id;
    form.submit();
}
function submitCatEdit($id){
    const input = document.querySelector('#category_id');
    const form = document.querySelector('#form');
    input.value =  $id;
    form.submit();
}
function deleteCatForm($id){
    const input = document.querySelector("#delete_category_id");
    const form = document.querySelector("#d_form");
    input.value = $id;
    form.submit();
}