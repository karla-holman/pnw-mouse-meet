<?php

namespace GoDaddy\WordPress\MWC\Shipping\Models;

use GoDaddy\WordPress\MWC\Common\Models\AbstractModel;
use GoDaddy\WordPress\MWC\Common\Traits\HasStringIdentifierTrait;
use GoDaddy\WordPress\MWC\Common\Traits\HasStringRemoteIdentifierTrait;
use GoDaddy\WordPress\MWC\Shipping\Contracts\LabelStatusContract;
use GoDaddy\WordPress\MWC\Shipping\Models\Contracts\LabelDocumentContract;
use GoDaddy\WordPress\MWC\Shipping\Models\Contracts\ShippingLabelContract;

/**
 * Represents a shipping label generated by a shipping provider.
 */
class ShippingLabel extends AbstractModel implements ShippingLabelContract
{
    use HasStringIdentifierTrait;
    use HasStringRemoteIdentifierTrait;

    /** @var LabelStatusContract */
    protected $status;

    /** @var LabelDocumentContract[] */
    protected $documents = [];

    /** @var bool */
    protected $isTrackable = false;

    /** @var string binary data for an image */
    private $data;

    /** @var string the image format */
    private $format;

    /**
     * {@inheritdoc}
     */
    public function getStatus() : LabelStatusContract
    {
        return $this->status;
    }

    /**
     * {@inheritdoc}
     */
    public function setStatus(LabelStatusContract $value)
    {
        $this->status = $value;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getDocuments() : array
    {
        return $this->documents;
    }

    /**
     * {@inheritdoc}
     */
    public function setDocuments(LabelDocumentContract ...$value)
    {
        $this->documents = $value;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getIsTrackable() : bool
    {
        return $this->isTrackable;
    }

    /**
     * {@inheritdoc}
     */
    public function setIsTrackable(bool $value)
    {
        $this->isTrackable = $value;

        return $this;
    }

    /**
     * Gets the binary data for an image.
     *
     * @deprecated
     *
     * @return string
     */
    public function getImageData() : string
    {
        return is_string($this->data) ? $this->data : '';
    }

    /**
     * Sets the binary data for an image.
     *
     * @deprecated
     *
     * @param string $value binary data
     * @return self
     */
    public function setImageData(string $value) : ShippingLabel
    {
        $this->data = $value;

        return $this;
    }

    /**
     * Gets the image format.
     *
     * @deprecated
     *
     * @return string
     */
    public function getImageFormat() : string
    {
        return is_string($this->format) ? $this->format : '';
    }

    /**
     * Sets the image format.
     *
     * @deprecated
     *
     * @param string $value image format
     * @return self
     */
    public function setImageFormat(string $value) : ShippingLabel
    {
        $this->format = $value;

        return $this;
    }
}
