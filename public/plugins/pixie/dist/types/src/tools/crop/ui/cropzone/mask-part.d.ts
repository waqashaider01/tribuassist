import { MutableRefObject } from 'react';
import { CropzoneRefs } from './cropzone-refs';
export declare enum MaskPosition {
    top = "maskTop",
    right = "maskRight",
    bottom = "maskBottom",
    left = "maskLeft"
}
declare type Props = {
    position: MaskPosition;
    refs: MutableRefObject<CropzoneRefs>;
};
export declare function MaskPart({ position, refs }: Props): JSX.Element;
export {};
