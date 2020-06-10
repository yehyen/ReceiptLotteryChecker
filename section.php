    <div class="input-group mb">
        <div class="input-group-prepend">
            <label class="input-group-text" for="inputGroupSelect01">Year in</label>
        </div>
        <select class="custom-select" name="year">
            <option selected>Choose...</option>
            <option value="2020">2020</option>
            <option value="2021">2021</option>
            <option value="2022">2022</option>
        </select>

        <div class="input-group-prepend">
            <label class="input-group-text" for="inputGroupSelect01">Month of</label>
        </div>
        <select class="custom-select" name="period">
            <option selected>Choose...</option>
            <option value="1">January & February</option>
            <option value="2">March & April</option>
            <option value="3">May & June</option>
            <option value="4">July & August</option>
            <option value="5">September & October</option>
            <option value="6">November & December</option>
        </select>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Receipt Mark</span>
            </div>
            <input type="text" class="form-control" name="code">
            <div class="input-group-prepend">
                <span class="input-group-text">Receipt Number</span>
            </div>
            <input type="text" class="form-control" name="number">
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">$</span>
            </div>
            <input type="text" class="form-control" name="expend">
            <button type="submit" class="btn btn-secondary" value="submit">Submit</button>
            <button type="reset" class="btn btn-secondary" value="reset">Reset</button>
        </div>
    </div>