<?php

namespace StarGrid\LaravelHolidayCalendar\Parser\Factory;

use PHPUnit\Framework\TestCase;

use StarGrid\LaravelHolidayCalendar\{
    Enum\ResponseTypeEnum, Parser\JsonParser, Parser\XmlParser
};

/**
 * Class ParserFactoryTest
 * @package StarGrid\LaravelHolidayCalendar\Parser\Factory
 *
 * @author Gabriel Anhaia <anhaia.gabriel@gmail.com>
 */
class ParserFactoryTest extends TestCase
{
    /**
     * Testa sucesso ao contruir uma parser to tipo Json.
     */
    public function testMakeJsonParser()
    {
        $parserFactory = new ParserFactory;

        $jsonParser = $parserFactory->makeParser(ResponseTypeEnum::JSON_RESPONSE());

        $this->assertEquals(new JsonParser, $jsonParser);
    }

    /**
     * Testa sucesso ao contruir uma parser to tipo XML.
     */
    public function testMakeXmlParser()
    {
        $parserFactory = new ParserFactory;

        $xmlParser = $parserFactory->makeParser(ResponseTypeEnum::XML_RESPONSE());

        $this->assertEquals(new XmlParser, $xmlParser);
    }
}