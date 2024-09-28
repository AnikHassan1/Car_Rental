<div class="modal animated zoomIn" id="update-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Car</h5>
            </div>
            <div class="modal-body">
                <form id="save-form">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 p-1">
                                <label class="form-label">Car Name *</label>
                                <input type="text" class="form-control" id="car_name">

                                <label class="form-label">Car Brand *</label>
                                <input type="text" class="form-control" id="carBrand">

                                <label class="form-label">Car Model *</label>
                                <input type="text" class="form-control" id="carModel">

                                <label class="form-label">Year of Manufacture *</label>
                                <input type="text" class="form-control" id="carYear">

                                <label class="form-label">Car Type *</label>
                                <input type="text" class="form-control" id="carType">

                                <label class="form-label">Daily Rent Price *</label>
                                <input type="text" class="form-control" id="carRent">



                                <label class="form-label">Availability Status *</label>
                                <select class="form-control" id="carStatus" aria-label="Default select example">
                                    <option value="0">Available</option>
                                    <option value="1">Unavailable</option>

                                </select>

                                <br />
                                <img class="w-15" id="newImg" src="{{ asset('images/default.jpg') }}" />
                                <br />

                                <label class="form-label">Car Image *</label>
                                <input oninput="oldImg.src=window.URL.createObjectURL(this.files[0])" type="file"
                                    class="form-control" id="oldImg">
                            </div>
                        </div>
                    </div>
                </form>
                <input type="text" class="d-none" id="updateID">
                <input type="text" class="d-none" id="filePath">
            </div>
            <div class="modal-footer">
                <button id="modal-close" class="btn bg-gradient-primary" data-bs-dismiss="modal"
                    aria-label="Close">Close</button>
                <button onclick="Save()" id="save-btn" class="btn bg-gradient-success">Save</button>
            </div>
        </div>
    </div>
</div>

<script>
    async function FillUpUpdateForm(id, filePath) {

        // document.getElementById('updateID').value = id;
        // document.getElementById('filePath').value = filePath;
        // document.getElementById('oldImg').src = filePath;


        // showLoader();
        // await UpdateFillCategoryDropDown();

        let res = await axios.get(`/cars/${id}`)
        // hideLoader();
// alert(res.data.name);
        document.getElementById('car_name').value = res.data.name;
        // document.getElementById('carBrand').value = res.data['brand'];
        // document.getElementById('carModel').value = res.data['model'];
        // document.getElementById('carYear').value = res.data['year'];
        // document.getElementById('carRent').value = res.data['car_type'];
        // document.getElementById('carType').value = res.data['daily_rent_price'];
        // document.getElementById('carStatus').value = res.data['availability'];
        // document.getElementById('carImage').files[0] = res.data['image'];
    }
</script>
