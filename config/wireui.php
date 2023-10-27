<?php

use WireUi\View\Components;

return [
    /*
        |--------------------------------------------------------------------------
        | Icons
        |--------------------------------------------------------------------------
        |
        | The icons config will be used in icon component as default
        | https://heroicons.com
        |
    */
    'icons' => [
        'style' => env('WIREUI_ICONS_STYLE', 'outline'),
    ],

    /*
        |--------------------------------------------------------------------------
        | Modal
        |--------------------------------------------------------------------------
        |
        | The default modal preferences
        |
    */
    'modal' => [
        'zIndex'   => env('WIREUI_MODAL_Z_INDEX', 'z-51'),
        'maxWidth' => env('WIREUI_MODAL_MAX_WIDTH', '2xl'),
        'spacing'  => env('WIREUI_MODAL_SPACING', 'p-4'),
        'align'    => env('WIREUI_MODAL_ALIGN', 'start'),
        'blur'     => env('WIREUI_MODAL_BLUR', false),
    ],

    /*
        |--------------------------------------------------------------------------
        | Card
        |--------------------------------------------------------------------------
        |
        | The default card preferences
        |
    */
    'card' => [
        'padding' => env('WIREUI_CARD_PADDING', 'px-2 py-5 md:px-4'),
        'shadow'  => env('WIREUI_CARD_SHADOW', 'shadow-md'),
        'rounded' => env('WIREUI_CARD_ROUNDED', 'rounded-lg'),
        'color'   => env('WIREUI_CARD_COLOR', 'bg-white dark:bg-secondary-800'),
    ],

    /*
        |--------------------------------------------------------------------------
        | Components
        |--------------------------------------------------------------------------
        |
        | List with WireUI components.
        | Change the alias to call the component with a different name.
        | Extend the component and replace your changes in this file.
        | Remove the component from this file if you don't want to use.
        |
     */
    'components' => [
        'avatar' => [
            'class' => Components\Avatar::class,
            'alias' => 'avatar-wireui',
        ],
        'icon' => [
            'class' => Components\Icon::class,
            'alias' => 'icon-wireui',
        ],
        'icon.spinner' => [
            'class' => Components\Icons\Spinner::class,
            'alias' => 'icon-wireui.spinner',
        ],
        'color-picker' => [
            'class' => Components\ColorPicker::class,
            'alias' => 'color-picker-wireui',
        ],
        'input' => [
            'class' => Components\Input::class,
            'alias' => 'input-wireui',
        ],
        'textarea' => [
            'class' => Components\Textarea::class,
            'alias' => 'textarea-wireui',
        ],
        'label' => [
            'class' => Components\Label::class,
            'alias' => 'label-wireui',
        ],
        'error' => [
            'class' => Components\Error::class,
            'alias' => 'error-wireui',
        ],
        'errors' => [
            'class' => Components\Errors::class,
            'alias' => 'errors-wireui',
        ],
        'inputs.maskable' => [
            'class' => Components\Inputs\MaskableInput::class,
            'alias' => 'inputs-wireui.maskable',
        ],
        'inputs.phone' => [
            'class' => Components\Inputs\PhoneInput::class,
            'alias' => 'inputs-wireui.phone',
        ],
        'inputs.currency' => [
            'class' => Components\Inputs\CurrencyInput::class,
            'alias' => 'inputs-wireui.currency',
        ],
        'inputs.number' => [
            'class' => Components\Inputs\NumberInput::class,
            'alias' => 'inputs-wireui.number',
        ],
        'inputs.password' => [
            'class' => Components\Inputs\PasswordInput::class,
            'alias' => 'inputs-wireui.password',
        ],
        'badge' => [
            'class' => Components\Badge::class,
            'alias' => 'badge-wireui',
        ],
        'badge.circle' => [
            'class' => Components\CircleBadge::class,
            'alias' => 'badge-wireui.circle',
        ],
        'button' => [
            'class' => Components\Button::class,
            'alias' => 'button-wireui',
        ],
        'button.circle' => [
            'class' => Components\CircleButton::class,
            'alias' => 'button-wireui.circle',
        ],
        'dropdown' => [
            'class' => Components\Dropdown::class,
            'alias' => 'dropdown-wireui',
        ],
        'dropdown.item' => [
            'class' => Components\Dropdown\DropdownItem::class,
            'alias' => 'dropdown-wireui.item',
        ],
        'dropdown.header' => [
            'class' => Components\Dropdown\DropdownHeader::class,
            'alias' => 'dropdown-wireui.header',
        ],
        'notifications' => [
            'class' => Components\Notifications::class,
            'alias' => 'notifications-wireui',
        ],
        'datetime-picker' => [
            'class' => Components\DatetimePicker::class,
            'alias' => 'datetime-picker-wireui',
        ],
        'time-picker' => [
            'class' => Components\TimePicker::class,
            'alias' => 'time-picker-wireui',
        ],
        'card' => [
            'class' => Components\Card::class,
            'alias' => 'card-wireui',
        ],
        'native-select' => [
            'class' => Components\NativeSelect::class,
            'alias' => 'native-select-wireui',
        ],
        'select' => [
            'class' => Components\Select::class,
            'alias' => 'select-wireui',
        ],
        'select.option' => [
            'class' => Components\Select\Option::class,
            'alias' => 'select-wireui.option',
        ],
        'select.user-option' => [
            'class' => Components\Select\UserOption::class,
            'alias' => 'select-wireui.user-option',
        ],
        'toggle' => [
            'class' => Components\Toggle::class,
            'alias' => 'toggle-wireui',
        ],
        'checkbox' => [
            'class' => Components\Checkbox::class,
            'alias' => 'checkbox-wireui',
        ],
        'radio' => [
            'class' => Components\Radio::class,
            'alias' => 'radio-wireui',
        ],
        'modal' => [
            'class' => Components\Modal::class,
            'alias' => 'modal-wireui',
        ],
        'modal.card' => [
            'class' => Components\ModalCard::class,
            'alias' => 'modal-wireui.card',
        ],
        'dialog' => [
            'class' => Components\Dialog::class,
            'alias' => 'dialog-wireui',
        ],
    ],
];
