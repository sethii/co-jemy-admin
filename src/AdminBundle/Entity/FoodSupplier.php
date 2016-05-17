<?php

namespace AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FoodSupplier
 *
 * @ORM\Table(name="food_suppliers")
 * @ORM\Entity
 */
class FoodSupplier
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
     * @ORM\Column(name="delivery_cost", type="decimal", scale=2)
     */
    private $deliveryCost;

    /**
     * @var string
     *
     * @ORM\Column(name="free_delivery_threshold", type="decimal", scale=2)
     */
    private $freeDeliveryThreshold;

    /**
     * @var string
     *
     * @ORM\Column(name="single_package_cost", type="decimal", scale=2)
     */
    private $singlePackageCost;

    /**
     * @var string
     *
     * @ORM\Column(name="phone_number", type="string", length=25)
     */
    private $phoneNumber;

    /**
     * @var string
     *
     * @ORM\Column(name="website_url", type="string", length=100)
     */
    private $websiteUrl;

    /**
     * @var string
     *
     * @ORM\Column(name="menu_url", type="string", length=500, nullable=true)
     */
    private $menuUrl;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="AdminBundle\Entity\MenuItem", mappedBy="foodSupplier", cascade={"remove"})
     */
    private $menuItems;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->menuItems = new \Doctrine\Common\Collections\ArrayCollection();
    }


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
     * @return FoodSupplier
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
     * Set deliveryCost
     *
     * @param string $deliveryCost
     *
     * @return FoodSupplier
     */
    public function setDeliveryCost($deliveryCost)
    {
        $this->deliveryCost = $deliveryCost;

        return $this;
    }

    /**
     * Get deliveryCost
     *
     * @return string
     */
    public function getDeliveryCost()
    {
        return $this->deliveryCost;
    }

    /**
     * Set freeDeliveryThreshold
     *
     * @param string $freeDeliveryThreshold
     *
     * @return FoodSupplier
     */
    public function setFreeDeliveryThreshold($freeDeliveryThreshold)
    {
        $this->freeDeliveryThreshold = $freeDeliveryThreshold;

        return $this;
    }

    /**
     * Get freeDeliveryThreshold
     *
     * @return string
     */
    public function getFreeDeliveryThreshold()
    {
        return $this->freeDeliveryThreshold;
    }

    /**
     * Set singlePackageCost
     *
     * @param string $singlePackageCost
     *
     * @return FoodSupplier
     */
    public function setSinglePackageCost($singlePackageCost)
    {
        $this->singlePackageCost = $singlePackageCost;

        return $this;
    }

    /**
     * Get singlePackageCost
     *
     * @return string
     */
    public function getSinglePackageCost()
    {
        return $this->singlePackageCost;
    }

    /**
     * Set phoneNumber
     *
     * @param string $phoneNumber
     *
     * @return FoodSupplier
     */
    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    /**
     * Get phoneNumber
     *
     * @return string
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * Set websiteUrl
     *
     * @param string $websiteUrl
     *
     * @return FoodSupplier
     */
    public function setWebsiteUrl($websiteUrl)
    {
        $this->websiteUrl = $websiteUrl;

        return $this;
    }

    /**
     * Get websiteUrl
     *
     * @return string
     */
    public function getWebsiteUrl()
    {
        return $this->websiteUrl;
    }

    /**
     * Set menuUrl
     *
     * @param string $menuUrl
     *
     * @return FoodSupplier
     */
    public function setMenuUrl($menuUrl)
    {
        $this->menuUrl = $menuUrl;

        return $this;
    }

    /**
     * Get menuUrl
     *
     * @return string
     */
    public function getMenuUrl()
    {
        return $this->menuUrl;
    }

    /**
     * Add menuItem
     *
     * @param \AdminBundle\Entity\MenuItem $menuItem
     *
     * @return FoodSupplier
     */
    public function addMenuItem(\AdminBundle\Entity\MenuItem $menuItem)
    {
        $this->menuItems[] = $menuItem;

        return $this;
    }

    /**
     * Remove menuItem
     *
     * @param \AdminBundle\Entity\MenuItem $menuItem
     */
    public function removeMenuItem(\AdminBundle\Entity\MenuItem $menuItem)
    {
        $this->menuItems->removeElement($menuItem);
    }

    /**
     * Get menuItems
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMenuItems()
    {
        return $this->menuItems;
    }
}
