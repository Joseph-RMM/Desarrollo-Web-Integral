<div wire:ignore.self class="modal fade bd-example-modal-lg" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header mx">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img class="d-block w-100 modalimg" wire:model="foto" src="#" alt="First slide">
                                </div>
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only negro">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only negro">Next</span>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h1 class="modal-title"> <input type="text" wire:model="nombre" disabled> </h1>
                        <h6 class="rojo"><input type="text" wire:model="Estado_actual_del_producto" disabled></h6>
                        <p><input type="text" wire:model="Descripcion" disabled> </p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click.prevent="cancel()" class="btn-eliminar btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>