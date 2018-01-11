<?php
namespace MorivenBundle\Controller;
use FOS\RestBundle\View\View;
use MorivenBundle\MorivenBundle;
use MorivenBundle\Repository\UserRepository;
use Symfony\Component\HttpFoundation\Response;

/**
 * Trait ControllerTrait
 * @package Contentpepper\CampaignerBundle\Controller
 */
trait ControllerTrait
{
    /**
     * @return int|null
     * @throws \LogicException
     */
    protected function getUserId()
    {
        return $this->getUser() ? $this->getUser()->getId() : null;
    }

    /**
     * @param string $data
     *
     * @return mixed
     *
     * @throws \Exception
     */
    protected function decode(string $data)
    {
        /** @var \Symfony\Component\Serializer\Serializer $serializer */
        $serializer = $this->get('serializer');
        return $serializer->decode($data, 'json');
    }
    /**
     *
     * @param mixed $message
     * @param int $status
     * @param array $headers
     *
     * @return View
     */
    protected function renderResponse($message, int $status = Response::HTTP_BAD_REQUEST, array $headers = [])
    {
        return View::create($message, $status, $headers);
    }

    /**
     * @return UserRepository
     */
    protected function getUserRepository()
    {
        return $this->get('cp.campaigner.user_repository');
    }
}