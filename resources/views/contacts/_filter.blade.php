<div class="row">
    <div class="col-md-6"></div>
    <div class="col-md-6">
        <form>
            <div class="row">
                <div class="col">
                    <select id="company_filter_id" name="company_id" class="custom-select">
                        @if ($allCompanies->count())
                            @foreach ($allCompanies as $id => $company)
                                <option {{ $id == request('company_id') ? 'selected' : null }}
                                    value="{{ $id }}">
                                    {{ $company }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
                <div class="col">
                    <div class="input-group mb-3">
                        <input type="text" name="search" id="search"
                            value="{{ request('search') }}"class="form-control" placeholder="Search..."
                            aria-label="Search..." aria-describedby="button-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" id="btn-clear" type="button">
                                <i class="fa fa-refresh"></i>
                            </button>
                            <button class="btn btn-outline-secondary" type="submit" id="button-addon2">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
