<?php

namespace App\Http\Controllers\Admin;

use App\Models\ServiceType;
use App\Repositories\ServiceType\ServiceTypeRepository;
use Carbon\Carbon;
use App\Http\Controllers\BaseController;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Redirect;
use Session;
use App\Models\Region;
use App\Repositories\Region\RegionRepository;

class ServicesController extends BaseController {

    private $region;
    /**
     * @var ServiceTypeRepository
     */
    private $serviceTypeRepository;
    /**
     * @var ServiceType
     */
    private $serviceType;
    /**
     * @var RegionRepository
     */
    private $regionRepository;

    public function __construct(RegionRepository $regionRepository, Region $region, ServiceTypeRepository $serviceTypeRepository, ServiceType $serviceType)
    {
        $this->serviceTypeRepository = $serviceTypeRepository;
        $this->serviceType = $serviceType;
        $this->regionRepository = $regionRepository;
        $this->region = $region;
   }

    /**
     * Display a listing of regions
     *
     * @return Response
     */
    public function index()
    {
        $regions = $this->regionRepository->all();
        $archive_data = $this->regionRepository->trashAll();
        $service_types = $this->serviceTypeRepository->all();
        $service_types_archive_data = $this->serviceTypeRepository->trashAll();
        return view('admin.services.index', compact('regions','archive_data','service_types','service_types_archive_data'));
    }
}
