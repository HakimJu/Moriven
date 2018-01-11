<?php
namespace MorivenBundle\Controller;
use FOS\RestBundle\View\View;
use Nelmio\ApiDocBundle\Annotation\Model;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Swagger\Annotations as SWG;
use Symfony\Component\Routing\Annotation\Route;



/**
 * Class UserController
 * @Rest\Prefix("/users")
 * @Rest\NamePrefix("moriven_usr_")
 * @package MorivenBundle\Controller
 */
class UserController extends FOSRestController
{
    /*
     * Delete user
     *
     * @Route("/user", methods={"GET"})
     *
     * @SWG\Response(
     *     response=200,
     *     description="user deleted",
     * )
     * @SWG\Tag(name="user")
     */
    public function deleteAction(Request $request)
    {
        try {
            $this->getUserRepository()->remove($this->getUserId());
        } catch (NotFoundHttpException $e) {
            return View::create($e->getMessage(), Response::HTTP_NOT_FOUND);
        } catch (\Exception $e) {
            return View::create($e->getMessage(), Response::HTTP_BAD_REQUEST);
        }
    }
}