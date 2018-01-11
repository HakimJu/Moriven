<?php
namespace MorivenBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;

/**
 * User
 *
 * @ORM\Table(name="users", uniqueConstraints={
 *     @ORM\UniqueConstraint(name="users_email_unique", columns={"email"})
 * })
 * @ORM\Entity(repositoryClass="MorivenBundle\Repository\UserRepository")
 */
class User extends BaseUser
{
    use BaseTrait;

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(name="id", type="integer", nullable=false)
     */
    public $id;

    /**
     * @var string
     *
     * @ORM\Column(name="avatar", type="string", length=255, nullable=true)
     */
    public $avatar = '';

    /**
     * @var string
     *
     * @ORM\Column(name="timezone", type="string", length=255, nullable=false)
     */
    public $timezone = 'Europe/Berlin';

    /**
     * @var string
     *
     * @ORM\Column(name="language", type="string", length=255, nullable=false)
     */
    public $language = 'en';

    /**
     * User constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->roles = ['ROLE_ADMIN', 'ROLE_SUPER_ADMIN'];
    }
}