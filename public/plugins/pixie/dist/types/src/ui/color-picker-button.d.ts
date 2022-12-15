import { ReactNode } from 'react';
import { InputSize } from '../common/ui/forms/input-field/input-size';
interface ColorPickerButtonProps {
    label?: ReactNode;
    className?: string;
    value?: string;
    size?: InputSize;
    onChange?: (value: string) => void;
    ['aria-label']?: string;
}
export declare function ColorPickerButton(props: ColorPickerButtonProps): JSX.Element;
declare type ArrowProps = {
    isActive: boolean;
    className: string;
};
export declare function ArrowIcon({ isActive, className }: ArrowProps): JSX.Element;
export {};
