<?php

namespace Staatic\Crawler\UrlExtractor;

final class FallbackUrlExtractor extends AbstractPatternUrlExtractor
{
    /**
     * @var string|null
     */
    private $filterBasePath;
    public function __construct(?callable $filterCallback = null, ?callable $transformCallback = null, ?string $filterBasePath = null)
    {
        $this->filterBasePath = $filterBasePath;
        parent::__construct($filterCallback, $transformCallback);
    }
    /**
     * @param string|null $filterBasePath
     */
    public function setFilterBasePath($filterBasePath) : void
    {
        $this->filterBasePath = $filterBasePath;
    }
    protected function getPatterns() : array
    {
        $formats = ['plain' => ['encode' => function (string $value) {
            return $value;
        }, 'decode' => function (string $value) {
            return $value;
        }], 'jsonEncoded' => ['encode' => function (string $value) {
            return \str_replace('/', '\\/', $value);
        }, 'decode' => function (string $value) {
            return \str_replace('\\/', '/', $value);
        }], 'urlEncoded' => ['encode' => function (string $value) {
            return \rawurlencode($value);
        }, 'decode' => function (string $value) {
            return \rawurldecode($value);
        }]];
        $patterns = [];
        foreach ($formats as $format => $options) {
            $slash = \preg_quote($options['encode']('/'), '~');
            $doubleColon = \preg_quote($options['encode'](':'), '~');
            $authority = \preg_quote($options['encode']($this->baseUrl->getAuthority()), '~');
            $filterBasePath = \preg_quote($options['encode'](\trim($this->filterBasePath, '/')), '~');
            $patterns[] = ['pattern' => '~(
                    (?P<scheme>https?' . $doubleColon . ')?' . $slash . $slash . $authority . '
                    (?P<port>' . $doubleColon . '(?:80|443))?
                    (?P<path>' . (empty($filterBasePath) ? '' : $slash . $filterBasePath) . '

                        # Either the URL has an extra path or in the future it has a non-path char.
                        (' . $slash . '|(?![a-z0-9-.]))
                    )

                )~iux', 'encode' => $options['encode'], 'decode' => $options['decode']];
        }
        return $patterns;
    }
}
