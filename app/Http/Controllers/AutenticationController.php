<?php


namespace App\Http\Controllers;

use App\Domain\AutenticationDomainInterface;
use App\ServiceContracts\AutenticacionContract;
use App\ViewModels\UserVM;
use Illuminate\Http\Request;

class AutenticationController extends Controller implements AutenticacionContract
{

    /**@var AutenticationDomainInterface**/
    private $domain;
    public function __construct(AutenticationDomainInterface $autenticationDomain)
    {
        $this->domain = $autenticationDomain;
    }

    public function log(Request $request):string {
        return $this->domain->log(new UserVM($request->get('userName'), $request->get('password')));
    }
}
