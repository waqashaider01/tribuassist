/// <reference types="react" />
import { resizeHandlePosition } from '../../common/ui/interactions/use-resize';
declare type Props = {
    position: resizeHandlePosition;
    inset?: boolean;
};
export declare function CornerHandle({ position, inset }: Props): JSX.Element;
export {};
