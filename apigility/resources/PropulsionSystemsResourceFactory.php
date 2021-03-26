<?php
namespace FlyingElephantService\V1\Rest\PropulsionSystems;

class PropulsionSystemsResourceFactory
{
    public function __invoke($services)
    {
        return new PropulsionSystemsResource($services->get('FlyingElephantService\Table'));
    }
}
