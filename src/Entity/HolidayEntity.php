<?php

namespace StarGrid\LaravelHolidayCalendar\Entity;

use StarGrid\LaravelHolidayCalendar\Enum\HolidayTypeEnum;

/**
 * Class HolidayEntity
 * @package StarGrid\LaravelHolidayCalendar\Entity
 *
 * @author Gabriel Anhaia <gabriel@stargrid.pro>
 */
class HolidayEntity
{
    /** @var \DateTime $date Data do feriado. */
    protected $date;

    /** @var string $name Nome do feriado. */
    protected $name;

    /** @var string $description Descrição do feriado. */
    protected $description;

    /** @var string $link Endereço da web para consultar informações sobre o feriado. */
    protected $link;

    /** @var HolidayTypeEnum $typeEnum Objeto com o tipo de feriado. */
    protected $typeEnum;

    /** @var string $typeName Nome do tipo de feriado (descrição retornada da API). */
    protected $typeName;

    /** @var string $rawData Dados do feriado retornado da API. */
    protected $rawData;

    /**
     * HolidayEntity constructor.
     *
     * @param \DateTime $date Data do feriado.
     * @param string $name Nome do feriado.
     * @param string $description Descrição do feriado.
     * @param string $link Endereço da web para consultar informações sobre o feriado.
     * @param HolidayTypeEnum $typeEnum Objeto com o tipo de feriado.
     * @param string $typeName Nome do tipo de feriado (descrição retornada da API).
     * @param string $rawData Dados do feriado retornado da API.
     */
    public function __construct(\DateTime $date, string $name, string $description, string $link, HolidayTypeEnum $typeEnum, string $typeName, string $rawData)
    {
        $this->date = $date;
        $this->name = $name;
        $this->description = $description;
        $this->link = $link;
        $this->typeEnum = $typeEnum;
        $this->typeName = $typeName;
        $this->rawData = $rawData;
    }

    /**
     * @return \DateTime
     */
    public function getDate(): \DateTime
    {
        return $this->date;
    }

    /**
     * @param \DateTime $date
     * @return HolidayEntity
     */
    public function setDate(\DateTime $date): HolidayEntity
    {
        $this->date = $date;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return HolidayEntity
     */
    public function setName(string $name): HolidayEntity
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return HolidayEntity
     */
    public function setDescription(string $description): HolidayEntity
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return string
     */
    public function getLink(): string
    {
        return $this->link;
    }

    /**
     * @param string $link
     * @return HolidayEntity
     */
    public function setLink(string $link): HolidayEntity
    {
        $this->link = $link;
        return $this;
    }

    /**
     * @return HolidayTypeEnum
     */
    public function getTypeEnum(): HolidayTypeEnum
    {
        return $this->typeEnum;
    }

    /**
     * @param HolidayTypeEnum $typeEnum
     * @return HolidayEntity
     */
    public function setTypeEnum(HolidayTypeEnum $typeEnum): HolidayEntity
    {
        $this->typeEnum = $typeEnum;
        return $this;
    }

    /**
     * @return string
     */
    public function getTypeName(): string
    {
        return $this->typeName;
    }

    /**
     * @param string $typeName
     * @return HolidayEntity
     */
    public function setTypeName(string $typeName): HolidayEntity
    {
        $this->typeName = $typeName;
        return $this;
    }

    /**
     * @return string
     */
    public function getRawData(): string
    {
        return $this->rawData;
    }

    /**
     * @param string $rawData
     * @return HolidayEntity
     */
    public function setRawData(string $rawData): HolidayEntity
    {
        $this->rawData = $rawData;
        return $this;
    }
}