<div class="modal animated zoomIn" id="create-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                <input type="text" class="form-control" id="carName">

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
                                <input type="text" class="form-control" id="carStatus">

                                <br/>
                                <img class="w-15" id="newImg" src="{{asset('images/default.jpg')}}"/>
                                <br/>

                                <label class="form-label">Car Image *</label>
                                <input oninput="newImg.src =window.URL.createObjectURL(this.files[0])" type="file" class="form-control" id="carImage">
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button id="modal-close" class="btn bg-gradient-primary" data-bs-dismiss="modal" aria-label="Close">Close</button>
                    <button onclick="Save()" id="save-btn" class="btn bg-gradient-success" >Save</button>
                </div>
            </div>
    </div>
</div>

<script>

    async function Save() {

        let carName = document.getElementById('carName').value;
        let carBrand = document.getElementById('carBrand').value;
        let carModel = document.getElementById('carModel').value;
        let carYear = document.getElementById('carYear').value;
        let carRent = document.getElementById('carRent').value;
        let carType = document.getElementById('carType').value;
        let carStatus = document.getElementById('carStatus').value;
        let carImage = document.getElementById('carImage').files[0];

        if (carName.length === 0) {
            errorToast("Car  Name Required !")
        }
        else if(carBrand.length===0){
            errorToast("Car Brand  Required !")
        }
        else if(carModel.length===0){
            errorToast("Customer Mobile Required !")
        }
        else if(carYear.length===0){
            errorToast("Car Year Required !")
        }
        else if(carRent.length===0){
            errorToast("Car Rent Required !")
        }
        else if(carType.length===0){
            errorToast("Car Type Mobile Required !")
        }
        else if(carStatus.length===0){
            errorToast("Car Status Required !")
        }
        else if(carImage.length===0){
            errorToast("Car Image Mobile Required !")
        }
        
        else {

            document.getElementById('modal-close').click();

            let formData=new FormData();
            
            formData.append('name',carName);
            formData.append('brand',carBrand);
            formData.append('model',carModel);
            formData.append('year',carYear);
            formData.append('car_type',carType);
            formData.append('daily_rent_price',carRent);
            formData.append('image',carImage);

            const config = {
                headers: {
                    'content-type': 'multipart/form-data'
                }
            }

            showLoader();
            let res = await axios.post("/cars",formData,config);
            hideLoader();

            if(res.status===201){
                successToast('Request completed');
                document.getElementById("save-form").reset();
                document.getElementById('newImg').src="{{asset('images/default.jpg')}}";
                await getList();
                
            }
            else{
                errorToast("Request fail !");
            }
        }
    }
 
</script>
