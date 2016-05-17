<?php

namespace AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MenuItem
 *
 * @ORM\Table(name="menu_items")
 * @ORM\Entity
 */
class MenuItem
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=100)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="price", type="decimal", scale=2)
     */
    private $price;

    /**
     * @var \AdminBundle\Entity\FoodSupplier
     *
     * @ORM\ManyToOne(targetEntity="AdminBundle\Entity\FoodSupplier", inversedBy="menuItems")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="food_supplier_id", referencedColumnName="id")
     * })
     */
    private $foodSupplier;



    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return MenuItem
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set price
     *
     * @param string $price
     *
     * @return MenuItem
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return string
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set foodSupplier
     *
     * @param \AdminBundle\Entity\FoodSupplier $foodSupplier
     *
     * @return MenuItem
     */
    public function setFoodSupplier(\AdminBundle\Entity\FoodSupplier $foodSupplier = null)
    {
        $this->foodSupplier = $foodSupplier;

        return $this;
    }

    /**
     * Get foodSupplier
     *
     * @return \AdminBundle\Entity\FoodSupplier
     */
    public function getFoodSupplier()
    {
        return $this->foodSupplier;
    }
}
