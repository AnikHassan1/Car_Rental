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
                                <select class="form-control" id="carStatus" aria-label="Default select example">
                                    <option value="0">Available</option>
                                    <option value="1">Unavailable</option>
                                    
                                  </select>

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