<?php
/**
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-09-27
 */

namespace Net\Bazzline\Component\Requirement;

interface RequirementConfigurationAwareInterface
{
    public function getRequirementConfiguration();

    public function hasRequirementConfiguration();

    public function setRequirementConfiguration(RequirementConfigurationInterface $requirementConfiguration);
}