<?php

namespace Drupal\encapsulator\Plugin\Validation\Constraint;

use Symfony\Component\Validator\Constraint;

/**
 * Comprova si la data de fi sigui superior a la data d'inici
 *
 * @Constraint(
 *   id = "StartEndDates",
 *   label = @Translation("Different Date", context = "Validation"),
 *   type = "string"
 * )
 */
class StartEndDatesConstraint extends Constraint {

	//Missatge que mostrarem la la validació/restricció falla
	public $startEndDateFail = 'La data de fi d\'emissió ha de ser més gran que la data d\'inici d\'emissió.';

}