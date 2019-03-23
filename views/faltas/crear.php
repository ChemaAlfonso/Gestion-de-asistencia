<div class="row">

    <div class="col-5 viewItemImgContainer">
        <img class="viewItemImg" src="https://picsum.photos/500/600?image=12" alt="">
    </div>

    <div class="col-6 mt-5">

        <div class="row">
            <div class="col-12 ">
                <h2>Nueva falta</h2>

                <form action="">

                    <div class="form-row">

                        <div class="col">
                            <label for="alumno_id">Alumno</label>
                            <input class="form-control" name="alumno_id" type="text" required>
                        </div>

                        <div class="col">
                            <label for="asignatura_id">Asignatura</label>
                            <input class="form-control" name="asignatura_id" type="text" required>
                        </div>

                    </div>

                    <div class="form-row">

                        <div class="col-6">
                            <label for="dia">Dia</label>
                            <input class="form-control" name="dia" type="date" required>
                        </div>
                        <div class="col-3 ">
                            <label for="horas">Horas</label>
                            <input class="text-center form-control" name="horas" type="number" step="0.01" required>
                        </div>

                    </div>
                    
                    <div class="col-12 text-center mt-3">
                        <input class="btn btn-primary" type="submit" value="Aceptar" >
                    </div>
                    
                </form>
            </div>
        </div>

    </div>

</div>